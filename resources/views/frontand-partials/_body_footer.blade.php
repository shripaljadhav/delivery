@php
    $app_settings =  App\Models\AppSetting::first();
    $dummy_data = Dummydata('dummy_title');
    $pages = App\Models\Pages::where('status', '1')->get();
@endphp

  <!-- START  FOOTER SECTION -->
  <footer class="footer mt-auto">

      <section class="py-4 py-md-5 py-xl-8 border-top border-light footer">
          <div class="container overflow-hidden">
              <div class="row gy-4 gy-lg-0 justify-content-xl-between">
                  <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                      <div class="widget">
                          <img src="{{ getSingleMediaSettingImage(getSettingFirstData('app_content','app_logo_image'),'app_logo_image') }}" width="60" height="57" class="me-2">
                          <span class="text-white logo-name text-decoration-none">{{ SettingData('app_content', 'app_name') }}</span>
                              <p class="mb-3 mt-3 text-white">{{ SettingData('download_app', 'download_footer_content') ?? $dummy_data }}</p>
                          <a class="text-decoration-none" href="{{ SettingData('app_content', 'play_store_link') ?? 'javascript:void(0)' }}"
                              {{ SettingData('app_content', 'play_store_link') != null ? 'target="_blank"' : '' }}>
                              <img src="{{ asset('frontend-website/assets/website/ic_play_store.png') }}"
                                  alt="play_store" class="mt-t me-2" width="110">
                          </a>

                          <a href="{{ SettingData('app_content', 'app_store_link') ?? 'javascript:void(0)' }}"
                              {{ SettingData('app_content', 'app_store_link') != null ? 'target="_blank"' : '' }}>
                              <img src="{{ asset('frontend-website/assets/website/ic_app_store.png') }}" alt="app_store" width="110">
                          </a>
                      </div>
                  </div>
                  <div class="col-12 col-md-4 col-lg-3 col-xl-2">
                      <div class="widget">
                          <h4 class="text-white widget-title mb-4 logo-name">
                              {{ SettingData('app_content', 'app_name') }}</h4>
                          <p class="mb-3 footer-p">
                              <a href="{{ route('about-us') }}"
                                  class="text-white text-decoration-none">{{ __('message.aboutus') }}</a>
                          </p>
                          <p class="mb-3 footer-p">
                              <a href="{{ route('contactus') }}"
                                  class="text-white text-decoration-none">{{ __('message.contact_us') }}</a>
                          </p>
                          <p class="mb-3 footer-p">
                              <a href="{{ route('privacypolicy') }}"
                                  class="text-white text-decoration-none">{{ __('message.privacy_policy') }}</a>
                          </p>
                          <p class="mb-3 footer-p">
                            <a href="{{ route('termofservice') }}"
                                class="text-white text-decoration-none">{{ __('message.terms_of_service') }}</a>
                          </p>
                          <p class="mb-3 footer-p">
                              <a href="{{ route('deliverypartner') }}"
                                  class="text-white text-decoration-none">{{ __('message.partner_message_list', ['name' => SettingData('app_content', 'app_name')]) }}</a>
                          </p>
                      </div>
                  </div>
                  <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                      <div class="widget">
                          <h4 class="widget-title mb-4 text-white logo-name">{{ __('message.contact') }}</h4>
                          <ul class="list-unstyled">
                              <li class="mb-2">
                                  <a href="{{ $app_settings->site_email ? 'mailto:' . $app_settings->site_email : 'javascript:void(0)' }}"
                                      {{ $app_settings->site_email ? 'target="_blank"' : '' }}
                                      class="text-white text-decoration-none footer-p">
                                      <i class="fa-solid fa-envelope me-2 fa-lg"></i>
                                      {{ $app_settings->site_email ?? $dummy_data }}
                                  </a>
                              </li>
                              <li class="mb-2">
                                  <a href="{{ $app_settings->support_number ? 'tel:' . $app_settings->support_number : 'javascript:void(0)' }}"
                                      {{ $app_settings->support_number ? 'target="_blank"' : '' }}
                                      class="text-white text-decoration-none footer-p">
                                      <i class="fa-solid fa-phone me-2 fa-lg"></i>
                                      {{ $app_settings->support_number ?? $dummy_data }}
                                  </a>
                              </li>
                              <li class="mb-2">
                                  <a class="text-white text-decoration-none footer-p d-flex"
                                      href="{{ $app_settings->site_description ? 'https://www.google.com/maps/search/?api=1&query=' . urlencode($app_settings->site_description) : 'javascript:void(0)' }}"
                                      {{ $app_settings->site_description ? 'target="_blank"' : '' }}>
                                      <i class="fa-solid fa-location-dot me-3 fa-lg mt-3"></i>
                                      <p>{{ $app_settings->site_description ?? $dummy_data }}</p>
                                  </a>
                              </li>
                          </ul>
                      </div>
                  </div>

                @if (count($pages) > 0)
                    <div class="col-lg-2 col-md-6 col-sm-6 mt-4 mt-lg-0 mt-md-0">
                        <h5 class="text-white mb-4">{{ __('message.pages') }}</h5>
                        <ul class="list-unstyled footer-p">
                            @foreach ($pages as $page)
                                <li class="mb-3">
                                    <a href="{{ isset($page->slug) && $page->slug != null  ? route('pages', ['slug' => $page->slug]) : 'javascript:void(0)' }}" class="footer-pages-content text-white text-decoration-none">
                                        {{ ucwords($page->title) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                  <div class="col-12 col-lg-3 col-xl-4">
                      <div class="widget">
                          <h4 class="widget-title mb-4 text-white logo-name">{{ __('message.social_media') }}</h4>
                          <form action="#!">
                              <div class="row gy-4">
                                  <div class="col-12">
                                      <div class="input-group">
                                          <a class="text-white text-decoration-none footer-p"
                                              href="{{ $app_settings->facebook_url ?? 'javascript:void(0)' }}"
                                              {{ $app_settings->facebook_url != null ? 'target="_blank"' : '' }}>
                                              <i class="fa-brands fa-facebook-f fa-xl me-4"></i>
                                          </a>
                                          <a class="text-white text-decoration-none footer-p"
                                              href="{{ $app_settings->twitter_url ?? 'javascript:void(0)' }}"
                                              {{ $app_settings->twitter_url != null ? 'target="_blank"' : '' }}>
                                              <i class="fa-brands fa-twitter fa-xl me-4"></i>
                                          </a>
                                          <a class="text-white text-decoration-none footer-p"
                                              href="{{ $app_settings->linkedin_url ?? 'javascript:void(0)' }}"
                                              {{ $app_settings->linkedin_url != null ? 'target="_blank"' : '' }}>
                                              <i class="fa-brands fa-linkedin-in fa-xl me-4"></i>
                                          </a>
                                          <a class="text-white text-decoration-none footer-p"
                                              href="{{ $app_settings->instagram_url ?? 'javascript:void(0)' }}"
                                              {{ $app_settings->instagram_url != null ? 'target="_blank"' : '' }}>
                                              <i class="fa-brands fa-instagram fa-xl me-4"></i>
                                          </a>
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </section>
  </footer>
  <!-- END FOOTER SECTION -->
