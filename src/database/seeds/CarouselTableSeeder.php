<?php

use Illuminate\Database\Seeder;

use App\Menu as Menu;
use App\User as User;

class  CarouselTableSeeder extends Seeder
{
    public function run()
    {

      $super_admin_user = User::where('email','=','super@domain.com')->first();
      $admin_user = User::where('email','=','admin@domain.com')->first();

       $carousel_dashboard = Menu::create( [
          'name'               => 'Carousel',
          'title'              => 'Carousel',
          'parent_id'          => '0',
          'icon'               => 'fa fa-camera-retro fa-fw',
          'sort_order'         => '0',
          'url'                => 'admin/carousels',
      ] );
      $carousel_dashboard->assign($super_admin_user);
      $carousel_dashboard->assign($admin_user);
    }
}
