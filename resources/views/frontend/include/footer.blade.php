<div class="container">
    <footer class="pt-5">
        <div class="row">
            <div class="col-sm-5 col-12">
                <h6>@lang('site.email'): info@ipersona.me</h6>
                <h6>@lang('site.phone_mobile'): 01012002624</h6>
                <h6>@lang('site.address'): @lang('site.site_address')</h6>
            </div>

            <div class="col-sm-3 col-12">
                <h5>@lang('footer.Need_Info')</h5>
                <ul class="nav flex-column mt-3">
                    <li class="nav-item mb-2"><a href="{{ route('about') }}" class="nav-link p-0 text-muted">@lang('site.About')</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('privacy') }}" class="nav-link p-0 text-muted">@lang('site.privacy_policy')</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('doctors') }}" class="nav-link p-0 text-muted">@lang('site.for_doctors')</a></li>
                    {{-- <li class="nav-item mb-2"><a href="{{ route('terms') }}" class="nav-link p-0 text-muted">@lang('site.Terms')</a></li> --}}
                    <li class="nav-item mb-2"><a href="{{ route('contact') }}" class="nav-link p-0 text-muted">@lang('site.Contact')</a></li>
                </ul>
            </div>


            <div class="col-sm-4 col-12">
                <form action="{{route('newsletter')}}" method="post" class="submit_form">
                    @csrf
                    <h5>@lang('footer.subscribe_newsletter')</h5>
                    <span class="pt-5">@lang('footer.subscribe_detail')</span>
                    <div class="d-flex w-100 gap-2">
                        <input type="text" name="email" class="form-control  email" placeholder="@lang('site.email')">
                        <button class="btn btn-site" type="submit">@lang('site.subscribe')</button>
                    </div>
                </form>
                <span class="mt-1">@lang('footer.follow')</span><br>
                <a href="https://www.facebook.com/iPersonaApp" target="_blank"><i class="fab fa-facebook fa-2x text-dark p-2 "></i></a>
                <a href="https://twitter.com/@ipersonaapp" target="_blank"><i class="fab fa-twitter fa-2x text-dark p-2"></i></a>
                <a href="https://www.linkedin.com/company/ipersona/" target="_blank"><i class="fab fa-linkedin fa-2x text-dark p-2"></i></a>
                <a href="https://instagram.com/ipersona.me" target="_blank"><i class="fab fa-instagram fa-2x text-dark p-2"></i></a>
                <a href="https://www.tiktok.com/@ipersona.me" target="_blank">
                    <img src="{{ asset('images/tiktok.png') }}" class="mb-3 p-2" style="width: 44px !important;">
                </a>
            </div>
        </div>

        <div class="pt-4 my-4 border-top text-center">
            <p>@lang('footer.Copyright') © {{ now()->year }} Ipersona. @lang('footer.reserved')</p>
        </div>
    </footer>
</div>
<a href="https://wa.me/201015810833" class="float" target="_blank" title="Support">
    <i class="fab fa-whatsapp my-float"></i>
    </a>
