<div class="col-12 mb-2 text-center">
	{{-- facebook --}}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'facebook']), 'fa fa-facebook', '', array('title'=> 'Facebook', 'class' => 'btn-social-icon btn-facebook')) !!}

    {{-- twitter --}}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'twitter']), 'fa fa-twitter', '', array('title'=> 'Twitter', 'class' => 'btn-social-icon btn-twitter')) !!}

    {{-- google --}}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'google']), 'fa fa-google', '', array('title'=> 'Google', 'class' => 'btn-social-icon btn-google')) !!}
	
	{{-- github --}}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'github']), 'fa fa-github', '', array('title'=> 'Github', 'class' => 'btn-social-icon btn-github')) !!}
	
	{{-- gitlab --}}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'gitlab']), 'fa fa-gitlab', '', array('title'=> 'Gitlab', 'class' => 'btn-social-icon btn-gitlab')) !!}

	{{-- bitbucket --}}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'bitbucket']), 'fa fa-bitbucket', '', array('title'=> 'BitBucket', 'class' => 'btn-social-icon btn-bitbucket')) !!}
	
	{{-- youtube --}}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'youtube']), 'fa fa-youtube', '', array('title'=> 'YouTube', 'class' => 'btn-social-icon btn-youtube')) !!}
	{{-- linkedin --}}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'linkedin']), 'fa fa-linkedin', '', array('title'=> 'LinkedIn', 'class' => 'btn-social-icon btn-linkedin')) !!}

    {{-- twitch --}}
    {{-- {!! HTML::icon_link(route('social.redirect',['provider' => 'twitch']), 'fa fa-twitch', '', array('title'=> 'Twitch', 'class' => 'btn-social-icon btn-twitch')) !!} --}}

    {{-- instagram --}}
    {!! HTML::icon_link(route('social.redirect',['provider' => 'instagram']), 'fa fa-instagram', '', array('title'=> 'Instagram', 'class' => 'btn-social-icon btn-instagram')) !!}

    {{-- 37signals --}}
    {{-- {!! HTML::icon_link(route('social.redirect',['provider' => '37signals']), 'fa fa-signal', '', array('title'=> '37Signals', 'class' => 'btn-social-icon btn-basecamp')) !!} --}}
</div>
