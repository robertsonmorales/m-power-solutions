<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Navigation;

class NavigationSeeder extends Seeder
{
    protected $nav;
    public function __construct(Navigation $nav){
        $this->nav = $nav;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $navs = array(
            array(
                'main' => array('Knowledge Base', 'dashboard', 'Dashboard', 'dashboard', 'single')
            ),
            array(
                'main' => array('Book', 'books', 'Dashboard', 'book', 'single')
            ),
            array(
                'main' => array('Students', 'students', 'Student', 'student', 'single')
            ),
            array(
                'main' => array('Calendar', 'calendar', 'Dashboard', 'calendar', 'single')
            ),
            array(
                'main' => array('Message', 'messages', 'Dashboard', 'messages-2', 'single')
            ),
        );

        $this->insertNavigation($navs);
    }

    public function insertNavigation($navs){
        for ($i=0; $i < count($navs); $i++) { 
            $nav = $navs[$i];

            $parent_navs = array(
                'nav_name' => $nav['main'][0],
                'nav_route' => $nav['main'][1],
                'nav_controller' => $nav['main'][2],
                'nav_icon' => $nav['main'][3],
                'nav_type' => $nav['main'][4],
                'nav_order' => $i + 1,
            );

            $parent = $this->nav->create($parent_navs);
            $parent_id = $parent->id;

            if(isset($nav['sub'])){
                for ($j=0; $j < count($nav['sub']); $j++) { 
                    $child_navs = array(
                        'nav_name' => $nav['sub'][$j][0],
                        'nav_route' => $nav['sub'][$j][1],
                        'nav_controller' => $nav['sub'][$j][2],
                        'nav_icon' => $nav['sub'][$j][3],
                        'nav_type' => $nav['sub'][$j][4],
                        'nav_suborder' => $j + 1,
                        'nav_childs_parent_id' => $parent_id
                    );

                    $this->nav->create($child_navs);
                }
            }
        }
    }
}
