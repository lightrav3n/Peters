<!--Page sidebar-->
<aside class="page-sidebar">
    <div class="h-100 flex-column d-flex justify-content-start">

        <!--Aside-logo-->
        <div class="aside-logo d-flex align-items-center flex-shrink-0 justify-content-start px-5 position-relative">
            <a href="{{route('cms.index')}}" class="d-block">
                <div class="d-flex align-items-center flex-no-wrap text-truncate">
                    <!--Sidebar-icon-->
                    <span class="sidebar-icon size-40 d-flex align-items-center justify-content-center fs-4 lh-1 text-white rounded-3 bg-gradient-primary fw-bolder"> BPT </span>
                    <span class="sidebar-text">
                    <!--Sidebar-text-->
                    <span class="sidebar-text text-truncate fs-3 fw-bold">
                      <img class="img-fluid" src="{{asset('assets/img/logo/bodenprobetechnik_logo_vector.svg')}}" width="140px" height="70px">
                    </span>
                  </span>
                </div>
            </a>
        </div>
        <!--Sidebar-Menu-->
        <div class="aside-menu px-3 my-auto" data-simplebar>
            <nav class="flex-grow-1 h-100" id="page-navbar">
                <!--:Sidebar nav-->
                <ul class="nav flex-column collapse-group collapse d-flex">
                    <li class="nav-item sidebar-title text-truncate opacity-50 small">
                        <i class="bi bi-three-dots"></i>
                        <span>Main</span>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('site.index',session()->get('language'))}}" class="nav-link d-flex align-items-center text-truncate">
                      <span class="sidebar-icon">
                        <span class="material-symbols-rounded">
                            home
                        </span>
                      </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">Site Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('cms.homepage.index')}}" class="nav-link d-flex align-items-center text-truncate">
                              <span class="sidebar-icon">
                                <span class="material-symbols-rounded">
                                  collections_bookmark
                                  </span>
                              </span>
                            <span class="sidebar-text">Home Texts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('cms.about.index')}}" class="nav-link d-flex align-items-center text-truncate">
                      <span class="sidebar-icon">
                        <span class="material-symbols-rounded">
                          record_voice_over
                          </span>
                      </span>
                            <span class="sidebar-text">About Us</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Download.index')}}" class="nav-link d-flex align-items-center text-truncate">
                      <span class="sidebar-icon">
                        <span class="material-symbols-rounded">
                          book
                          </span>
                      </span>
                            <span class="sidebar-text">Brochures</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('cms.productlp.index')}}" class="nav-link d-flex align-items-center text-truncate">
                      <span class="sidebar-icon">
                        <span class="material-symbols-rounded">
                          web
                          </span>
                      </span>
                            <span class="sidebar-text">Product LP</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Products.index')}}" class="nav-link d-flex align-items-center text-truncate">
                      <span class="sidebar-icon">
                        <span class="material-symbols-rounded">
                          shopping_cart
                          </span>
                      </span>
                            <span class="sidebar-text">Products</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('cms.orders.index')}}" class="nav-link d-flex align-items-center text-truncate">
                              <span class="sidebar-icon">
                                <span class="material-symbols-rounded">
                                  shopping_bag
                                  </span>
                              </span>
                            <span class="sidebar-text">Orders</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('News.index')}}" class="nav-link d-flex align-items-center text-truncate">
                      <span class="sidebar-icon">
                        <span class="material-symbols-rounded">
                          newspaper
                          </span>
                      </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">News</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Testimonials.index')}}" class="nav-link d-flex align-items-center text-truncate">
                      <span class="sidebar-icon">
                        <span class="material-symbols-rounded">
                          chat
                          </span>
                      </span>
                            <span class="sidebar-text">Testimonials</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Partners.index')}}" class="nav-link d-flex align-items-center text-truncate">
                      <span class="sidebar-icon">
                        <span class="material-symbols-rounded">
                          handshake
                          </span>
                      </span>
                            <span class="sidebar-text">Partners</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('Team.index')}}" class="nav-link d-flex align-items-center text-truncate">
                      <span class="sidebar-icon">
                        <span class="material-symbols-rounded">
                          supervised_user_circle
                          </span>
                      </span>
                            <span class="sidebar-text">Team</span>
                        </a>
                    </li>
                    @role('Super Admin')
                    <li class="nav-item">
                        <a href="{{route('cms.notice.index')}}" class="nav-link d-flex align-items-center text-truncate">
                              <span class="sidebar-icon">
                                <span class="material-symbols-rounded">
                                  fingerprint
                                  </span>
                              </span>
                            <span class="sidebar-text">Site Notice</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('cms.cookie.index')}}" class="nav-link d-flex align-items-center text-truncate">
                              <span class="sidebar-icon">
                                <span class="material-symbols-rounded">
                                  fingerprint
                                  </span>
                              </span>
                            <span class="sidebar-text">Cookie Policy</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('cms.privacy.index')}}" class="nav-link d-flex align-items-center text-truncate">
                              <span class="sidebar-icon">
                                <span class="material-symbols-rounded">
                                  fingerprint
                                  </span>
                              </span>
                            <span class="sidebar-text">Privacy Policy</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('cms.settings')}}" class="nav-link d-flex align-items-center text-truncate">
                      <span class="sidebar-icon">
                        <span class="material-symbols-rounded">
                          settings
                          </span>
                      </span>
                            <span class="sidebar-text">Settings</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('cms.Users.index')}}" class="nav-link d-flex align-items-center text-truncate">
                          <span class="sidebar-icon">
                            <span class="material-symbols-rounded">
                              manage_accounts
                              </span>
                          </span>
                            <!--Sidebar nav text-->
                            <span class="sidebar-text">Users</span>
                        </a>
                    </li>
                    @endrole
                </ul>
            </nav>
        </div>
    </div>
</aside>
<div
    class="sidebar-close d-lg-none">
    <a href="#"></a>
</div>
