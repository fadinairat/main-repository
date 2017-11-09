<div class="navbar navbar-inverse set-radius-zero" >
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo URL::asset('').\Config::get("app.locale"); ?>">
                        <img alt='{{trans('global_names.site_title')}}' title='{{trans('global_names.site_title')}}' src="{{ URL::asset('') }}public/images/logo2.png" class="top_logo" />
                    </a>

                </div>
            </div>
            <div class="col-md-10">                
                <div style="clear:both;">
                    <div class="{{trans('layout.float_rev')}}-div" style="padding-left:0;">
                        <?php if(\Session::has("u_username")){
                            echo '<a href="'.URL::asset("Logout").'" class="lang">'.strtoupper(trans('messages.logout')).' |</a>';
                        }?> 
                        <a href="<?php echo URL::asset(trans('messages.rev_lang')); ?>" class="lang"><?php echo strtoupper(trans('messages.rev_lang')) ?></a>
                        <a href="https://www.facebook.com/agribusinessaccelerator" target="_blank"><img width="25" src="{{ URL::asset('') }}public/images/f.png"></a>
                        <a href="https://twitter.com/agbusinesshub" target="_blank"><img width="25" src="{{ URL::asset('') }}public/images/t.png"></a>
                        <a href="https://www.instagram.com/agri_business_accelerator/" target="_blank"><img width="25" src="{{ URL::asset('') }}public/images/ins.png"></a>
                        <a href="https://www.youtube.com/channel/UCfdYWMUsPbAbb2Ubk-cKUpw" target="_blank"><img width="25" src="{{ URL::asset('') }}public/images/y.png"></a>
                        <a href="https://www.linkedin.com/in/agribusiness-accelerator-273119145/" target="_blank"><img width="25" src="{{ URL::asset('') }}public/images/linked.png"></a>
                    </div>
                    <div  class="{{trans('layout.float_rev')}}-div" style="padding-left:0;">
                        <form method="POST" action="{{URL::asset(\Session::get('locale').'/Search/Index')}}" >
                            <input type="text" style="border:solid 1px #ccc;font-size:15px;padding-right:10px;height:30px;border-radius:5px;width:200px;text-align:{{trans('messages.text_align')}}" placeholder="{{trans('messages.search_here')}}" name="searchkey" id="searchkey" >
                            
                        </form>
                    </div>
                </div>
                <div class="navbar-collapse collapse " style="clear:both;padding:0">
                <?php 
                
                $menus = App\Http\Models\Menus::getMenus(2,0);                                       
                ?>
                    <ul id="menu-top" class="nav navbar-nav navbar-{{trans('layout.float_rev')}}">
                        <?php 
                        foreach($menus as $menu){
                            $sub_menus = App\Http\Models\Menus::getMenus(2,$menu->m_id);
                            if(count($sub_menus)>0){
                                $class1="class='dropdown mainLi'";
                            }
                            else {$class1=" class='mainLi'";}

                            echo '<li '.$class1.' id="'.$menu['m_id'].'"><a href="'.URL::asset('').processLink($menu->m_link).'">'.$menu->m_name.'</a>';
                            
                            if(count($sub_menus)>0){
                                echo "<ul class='dropdown-menu' id='td".$menu->m_id."' style='bottom-right-radius: 10px; border-bottom-left-radius: 10px;'>";
                                foreach($sub_menus as $sub){
                                    echo '<li class="menu-item menu" role="menu"><a href="'.URL::asset('').processLink($sub->m_link).'">'.$sub->m_name.'</a></li>';
                                }
                                echo "</ul>";
                            }
                            echo '</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- LOGO HEADER END-->