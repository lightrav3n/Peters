<meta name="keywords" content="@yield('meta_keywords', $meta['keywords'] ?? $siteSettings['meta_keywords']->option_value)">
<meta name="description" content="@yield('meta_description', $meta['description'] ?? $siteSettings['meta_description']->option_value)">
<!-- Itemprop  -->
<meta itemprop="name" content="@yield('meta_description', $meta['description'] ?? $siteSettings['meta_description']->option_value)">
<meta itemprop="description" content="@yield('meta_description', $meta['description'] ?? $siteSettings['meta_description']->option_value)">
<meta itemprop="image" content="@yield('meta_image', $meta['image'] ?? $siteSettings['meta_image']->option_value))">
<!-- Open Graph / Facebook -->
<meta property="og:type" content="website" />
<meta property="og:url" content="@yield('meta_url', $meta['meta_url'] ??  $siteSettings['site_url']->option_value)" />
<meta property="og:title" content="@yield('meta_title', $meta['title'] ?? $siteSettings['site_name']->option_value)" />
<meta property="og:description" content="@yield('meta_description', $meta['description'] ?? $siteSettings['meta_description']->option_value)" />
<meta property="og:image" content="@yield('meta_image', $meta['image'] ?? $siteSettings['meta_image']->option_value)" />
<meta property="og:image" content="@yield('meta_image_sm', $meta['image_sm'] ?? $siteSettings['meta_image']->option_value)" />
<meta property="og:image:alt" content="@yield('meta_description', $meta['description'] ?? $siteSettings['meta_description']->option_value)" />
<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="@yield('meta_url', $meta['meta_url'] ?? $siteSettings['site_url']->option_value)">
<meta property="twitter:title" content="@yield('meta_title', $meta['title'] ?? $siteSettings['site_name']->option_value)">
<meta property="twitter:description" content="@yield('meta_description', $meta['description'] ?? $siteSettings['meta_description']->option_value)">
<meta property="twitter:image" content="@yield('meta_image', $meta['image'] ?? $siteSettings['meta_image']->option_value)">
