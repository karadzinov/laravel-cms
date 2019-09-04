<style>
    #header.translucent{
        position: absolute;
    }
</style>
<!-- -->
<section id="slider" class="fullheight" style="background:url('{{asset('assets/theme-2/demo_files/images/1200x800/5-min.jpg')}}');">
    <div class="overlay dark-5"><!-- dark overlay [0 to 9 opacity] --></div>

    <div class="display-table">
        <div class="display-table-cell vertical-align-middle">
            <div class="container text-center">

                <h1 class="mb-20 fs-40 mt-80">403</h1>
                <p class="fs-20 font-lato text-muted">
                    <h2>{{trans('general.errors.forbiden')}}</h2>
                </p>

                <div style="max-width:500px; margin:auto;">

                    <form class="validate m-0" action="{{route('search')}}" method="get">
                        {{csrf_field()}}
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                            <input type="text" id="main_search_box" name="search" class="form-control" placeholder="{{trans('general.search')}}">
                            <span class="input-group-btn">
                                <button class="btn btn-success" type="submit">{{trans('general.search')}}</button>
                            </span>
                        </div>
                        <div id="mainSearchResponse"></div>
                    </form>

                </div>
                <br>
                <a class="fs-20 font-lato wow fadeInUp animated" href="{{route('public.home')}}" data-wow-delay="1.9s" style="visibility: visible; animation-delay: 1.9s; animation-name: fadeInUp;"><i class="glyphicon glyphicon-menu-left mr-10 fs-16"></i> {{trans('general.back-to-home')}}!</a>

            </div>
        </div>
</section>
<!-- / -->