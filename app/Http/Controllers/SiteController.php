<?php

namespace App\Http\Controllers;

use App\Models\AsociatedProduct;
use App\Models\BrochureDownload;
use App\Models\ConfigOrder;
use App\Models\PageContent;
use App\Models\Partner;
use App\Models\Product;
use App\Models\ProductCard;
use App\Models\Testimonial;
use App\Services\Configurator;
use App\Traits\LanguageTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class SiteController extends Controller
{
    use LanguageTrait;

    public function selectLanguage(Request $request, $id): RedirectResponse
    {
        $this->LangSetTrait($id);

        $segments = str_replace(url('/'), '', url()->previous());
        $segments = array_filter(explode('/', $segments));
        array_shift($segments);
        array_unshift($segments, $id);

        return redirect()->to(implode('/', $segments));
    }

    public function index(): View
    {
        $headline = PageContent::query()
            ->where('page_name', 'home_hl')
            ->where('language', Session::get('language'))->first();

        $productCards = ProductCard::query()->where('language', Session::get('language'))->where('position', 1)->get();
        $productCards2 = ProductCard::query()->where('language', Session::get('language'))->where('position', 2)->get();

        $partners = Partner::query()->with('media')->get();
        $testimonials = Testimonial::query()->get();

        $expertise = PageContent::query()
            ->where('page_name', 'home_expertise')
            ->where('language', Session::get('language'))->first();

        return \view('index', compact('testimonials', 'partners', 'headline', 'productCards', 'productCards2', 'expertise'));
    }

    public function aboutUs(): View {
        $headline = PageContent::query()
            ->where('page_name', 'about_hl')
            ->where('language', Session::get('language'))->first();

        $companyProfile = PageContent::query()
            ->where('page_name', 'company_profile')
            ->where('language', Session::get('language'))->first();

        return \view('about', compact('headline', 'companyProfile'));
    }

    public function downloads(): View
    {
        $brochures = BrochureDownload::query()->get();
        return \view('downloads', compact('brochures'));
    }
    /**
     * @param Request $request
     * @param Product $Product
     * @return RedirectResponse
     */
    public function addToConfig(Request $request, Product $Product)
    {
        $oldConfig = Session::has('config') ? Session::get('config') : null;
//        if ($oldConfig && count($oldConfig->items) == 3){
//            $request->session()->forget('config');
//        }
        $config = new Configurator($oldConfig);

        if ($config->items)
        {
            foreach ($config->items as $item)
            {
                foreach ($item as $product){
                    if ($Product->category->id === $product->category->id){
                        $config->removeItem($product->id);
                    }
                }
            }
        }

        $config->add($Product->load(['media','category','descriptions']), $Product->id);

        $request->session()->put('config', $config);

        return redirect()->route('site.product.configurator', [Session::get('language'),$Product->product_slug])->with('addedToConfig', 'Product added for configuration steps');
    }

    public function clearConfig(Request $request): RedirectResponse
    {
        $request->session()->forget('config');
        return redirect()->route('site.index', Session::get('language'))->with('configCleared', 'Configuration steps and products were retested');
    }

    public function productConfigurator($language, $slug = null): View
    {
        if ($slug != null){
            $config = Session::get('config');
            $notInKeys = [];
            $notInCat = [];
            foreach ($config->items as $key=>$value){
                $notInKeys[] = $key;
                foreach ($value as $itm){
                    $notInCat[] = $itm->category_id;
                }
            }
            $ignore = Product::query()->whereIn('category_id', $notInCat)->pluck('id');

            $product = Product::query()->where('product_slug', $slug)->first();

            $relatedProducts = AsociatedProduct::query()
                ->where('product_id', $product->id)
                ->whereNotIn('related_id',$notInKeys)
                ->whereNotIn('related_id', $ignore)
                ->with('relatedTo')
                ->get();
            return \view('products.configurator', compact('relatedProducts', 'product'));
        }
        elseif (Session::has('config')){
        $config = Session::get('config');
        $product = Product::query()->where('product_slug', $config->items[key($config->items)]['item']->product_slug)->first();
        $relatedProducts = [];
        return \view('products.configurator', compact('relatedProducts', 'product'));
    }
        return \view('products.index');
    }
    public function orderfinish(Request $request){
        $config = Session::get('config');

        $this->validate($request, [
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|min:3',
            'g-recaptcha-response' => 'recaptcha',
        ]);

        $uniqueid = md5(uniqid());
        foreach ($config->items as $key=>$value){
            $order = new ConfigOrder();
            $order->order_uid = $uniqueid;
            $order->product_id = $key;
            $order->client_name = $request['name'];
            $order->client_email = $request['email'];
            $order->save();
        }
        $data = array(
            'idcomanda' => $uniqueid,
            'name' => $request->name,
            'email' => $request->email,
            'products' => $config->items,
            'msg' => $request->message
        );
        Mail::send('emails.order_'.\session()->get('language'), $data, function ($message) use ($data) {
            $message->from('info@bodenprobetechnik.de');
            $message->to($data['email']);
            $message->bcc('info@bodenprobetechnik.de');
            $message->subject('Peters Product Configuration');
        });

        Session::forget('config');

        return redirect()->route('site.index',session()->get('language'))->with('success', 'Order was sent successfully');
    }

    public function orderOffer(Request $request, Product $product){
        $this->validate($request, [
            'name' => 'required|min:3|max:40',
            'email' => 'required|email|min:3',
            'g-recaptcha-response' => 'recaptcha',
        ]);
        $uniqueid = md5(uniqid());

        $order = new ConfigOrder();
        $order->order_uid = $uniqueid;
        $order->product_id = $product->id;
        $order->client_name = $request['name'];
        $order->client_email = $request['email'];
        $order->save();

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'product' => $product->product_name,
            'msg' => $request->message
        );
        Mail::send('emails.offer', $data, function ($message) use ($data) {
            $message->from('info@bodenprobetechnik.de');
            $message->to($data['email']);
            $message->bcc('info@bodenprobetechnik.de');
            $message->subject('Peters Product Order');
        });

        return redirect()->route('site.index',session()->get('language'))->with('success', 'Order was sent successfully');
    }

    public function contactFormSend(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|min:3',
            'message' => 'required|min:3',
            'g-recaptcha-response' => 'recaptcha',
        ]);
        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'msg' => $request->message
        );
        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from('info@bodenprobetechnik.de');
            $message->to($data['email']);
            $message->cc('info@bodenprobetechnik.de');
            $message->subject('Peters Website contact form message');
        });

        return redirect()->route('site.index',session()->get('language'))->with('success', 'Message was sent successfully');
    }
    public function sitePolicy(){
        $policy = PageContent::query()
            ->where('language', Session::get('language'))
            ->where('page_name', 'notice_policy')->first();

        return \view('privacy-policy', compact('policy'));
    }
    public function cookiePolicy(){
        $policy = PageContent::query()
            ->where('language', Session::get('language'))
            ->where('page_name', 'cookie_policy')->first();

        return \view('privacy-policy', compact('policy'));
    }
    public function privacyPolicy(){
        $policy = PageContent::query()
            ->where('page_name', 'privacy_page')
            ->where('page_content', '!=', null)
            ->whereIn('language', [session()->get('language'), 'de'])
            ->orderBy('id', 'desc')
            ->first();

        return \view('privacy-policy', compact('policy'));
    }
}
