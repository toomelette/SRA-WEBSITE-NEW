<?php 

namespace App\Swep\Subscribers;

use Hash;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Menu;
use App\Models\SubMenu;
use App\Models\UserMenu;
use App\Models\UserSubMenu;
use Illuminate\Support\Str;
use App\Swep\Helpers\CacheHelper;



class UserSubscriber{


	protected $user;
	protected $menu;
	protected $submenu;
	protected $user_menu;
	protected $carbon;
	protected $auth;
    protected $str;
    protected $cache;



	public function __construct(User $user, Menu $menu, SubMenu $submenu, UserMenu $user_menu, UserSubMenu $user_submenu, Carbon $carbon, Str $str){

		$this->user = $user;
		$this->menu = $menu;
		$this->submenu = $submenu;
		$this->user_menu = $user_menu;
		$this->user_submenu = $user_submenu;
		$this->carbon = $carbon;
        $this->str = $str;
		$this->auth = auth();

	}



	public function subscribe($events){

		$events->listen('user.create', 'App\Swep\Subscribers\UserSubscriber@onCreate');
        $events->listen('user.update', 'App\Swep\Subscribers\UserSubscriber@onUpdate');
        $events->listen('user.delete', 'App\Swep\Subscribers\UserSubscriber@onDelete');
        $events->listen('user.activate', 'App\Swep\Subscribers\UserSubscriber@onActivate');
        $events->listen('user.deactivate', 'App\Swep\Subscribers\UserSubscriber@onDeactivate');
        $events->listen('user.logout', 'App\Swep\Subscribers\UserSubscriber@onLogout');
        $events->listen('user.reset_password', 'App\Swep\Subscribers\UserSubscriber@onResetPassword');

	}



	public function onCreate($request){

        $user = new User;
        $user->firstname = strtoupper($request->firstname);
        $user->middlename = strtoupper($request->middlename);
        $user->lastname = strtoupper($request->lastname);
        $user->email = $request->email;
        $user->position = strtoupper($request->position);
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();

		$this->createDefaults($user);

		for($i = 0; $i < count($request->menu); $i++){

            $menu = $this->menu->whereMenuId($request->menu[$i])->first();

            $user_menu = new UserMenu;
            $this->createUserMenu($user_menu, $user, $menu);

            if($request->submenu > 0){

                foreach($request->submenu as $data_submenu){

                	$submenu = $this->submenu->whereSubmenuId($data_submenu)->first();

	                if($menu->menu_id === $submenu->menu_id){

	                    $user_submenu = new UserSubMenu;
	                    $this->createUserSubmenu($user_submenu, $submenu, $user_menu);

	                }

                }

            }

        }

        CacheHelper::deletePattern('swep_cache:user:all:*');
        
	}




    public function onUpdate($user, $request){

        $user->firstname = strtoupper($request->firstname);
        $user->middlename = strtoupper($request->middlename);
        $user->lastname = strtoupper($request->lastname);
        $user->email = $request->email;
        $user->position = strtoupper($request->position);
        $user->username = $request->username;
        $user->save();

        $this->updateDefaults($user);
        $user->userMenu()->delete();
        $user->userSubmenu()->delete();

        for($i = 0; $i < count($request->menu); $i++){

            $menu = $this->menu->whereMenuId($request->menu[$i])->first();

            $user_menu = new UserMenu;
            $this->createUserMenu($user_menu, $user, $menu);

            if($request->submenu > 0){

                foreach($request->submenu as $data_submenu){

                    $submenu = $this->submenu->whereSubmenuId($data_submenu)->first();

                    if($menu->menu_id === $submenu->menu_id){

                        $user_submenu = new UserSubMenu;
                        $this->createUserSubmenu($user_submenu, $submenu, $user_menu);

                    }

                }

            }

        }

        CacheHelper::deletePattern('swep_cache:user:all:*');
        CacheHelper::deletePattern('swep_cache:user:bySlug:'. $user->slug .'');
        CacheHelper::deletePattern('swep_cache:user_menus:byUserId:'. $user->user_id .'');

    }




    public function onDelete($user){

        $user->userMenu()->delete();
        $user->userSubmenu()->delete();
        
        CacheHelper::deletePattern('swep_cache:user:all:*');
        CacheHelper::deletePattern('swep_cache:user:bySlug:'. $user->slug .'');
        CacheHelper::deletePattern('swep_cache:user_menus:byUserId:'. $user->user_id .'');

    }




    public function onActivate($user){

        CacheHelper::deletePattern('swep_cache:user:all:*');
        CacheHelper::deletePattern('swep_cache:user:bySlug:'. $user->slug .'');
        CacheHelper::deletePattern('swep_cache:user_menus:byUserId:'. $user->user_id .'');

    }




    public function onDeactivate($user){

        CacheHelper::deletePattern('swep_cache:user:all:*');
        CacheHelper::deletePattern('swep_cache:user:bySlug:'. $user->slug .'');
        CacheHelper::deletePattern('swep_cache:user_menus:byUserId:'. $user->user_id .'');

    }




    public function onLogout($user){

        CacheHelper::deletePattern('swep_cache:user:all:*');
        CacheHelper::deletePattern('swep_cache:user:bySlug:'. $user->slug .'');
        CacheHelper::deletePattern('swep_cache:user_menus:byUserId:'. $user->user_id .'');

    }




    public function onResetPassword($request, $user){

        $user->password = Hash::make($request->password);
        $user->is_online = 0;
        $user->save();

        CacheHelper::deletePattern('swep_cache:user:all:*');
        CacheHelper::deletePattern('swep_cache:user:bySlug:'. $user->slug .'');
        CacheHelper::deletePattern('swep_cache:user_menus:byUserId:'. $user->user_id .'');

    }



	/** DEFAULTS **/

	public function createDefaults($user){

		$user->user_id = $this->user->userIdIncrement;
        $user->slug = $this->str->random(16);
        $user->is_online = false;
        $user->is_active = false;
        $user->color = 'skin-green sidebar-mini';

        $user->created_at = $this->carbon->now();
        $user->updated_at = $this->carbon->now();
        $user->ip_created = request()->ip();
        $user->ip_updated = request()->ip();
        $user->user_created = $this->auth->user()->username;
        $user->user_updated = $this->auth->user()->username;
        $user->last_login_time = null;
        $user->last_login_machine = null;
        $user->last_login_ip = null;
        $user->save();

	}



    public function updateDefaults($user){

        $user->updated_at = $this->carbon->now();
        $user->ip_updated = request()->ip();
        $user->user_updated = $this->auth->user()->username;
        $user->save();

    }



	/** UTILITY METHODS **/

	public function createUserMenu($user_menu, $user, $menu){

		$user_menu->user_menu_id = $this->user_menu->userMenuIdIncrement;
        $user_menu->user_id = $user->user_id;
        $user_menu->menu_id = $menu->menu_id;
        $user_menu->name = $menu->name;
        $user_menu->route = $menu->route;
        $user_menu->icon = $menu->icon;
        $user_menu->is_menu = $menu->is_menu;
        $user_menu->is_dropdown = $menu->is_dropdown; 
        $user_menu->save();

	}



	public function createUserSubmenu($user_submenu, $submenu, $user_menu){

        $user_submenu->submenu_id = $submenu->submenu_id;
        $user_submenu->user_menu_id = $user_menu->user_menu_id;
        $user_submenu->user_id = $user_menu->user_id;
        $user_submenu->is_nav = $submenu->is_nav;
        $user_submenu->name = $submenu->name;
        $user_submenu->route = $submenu->route;
        $user_submenu->save();

	}



}