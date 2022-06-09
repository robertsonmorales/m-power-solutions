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
                'main' => array('Knowledge Base', 'dashboard', 'Dashboard', '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M22 8.27V4.23C22 2.64 21.36 2 19.77 2H15.73C14.14 2 13.5 2.64 13.5 4.23V8.27C13.5 9.86 14.14 10.5 15.73 10.5H19.77C21.36 10.5 22 9.86 22 8.27Z" stroke="#8F9BB3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.5 8.52V3.98C10.5 2.57 9.86 2 8.27 2H4.23C2.64 2 2 2.57 2 3.98V8.51C2 9.93 2.64 10.49 4.23 10.49H8.27C9.86 10.5 10.5 9.93 10.5 8.52Z" stroke="#8F9BB3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M10.5 19.77V15.73C10.5 14.14 9.86 13.5 8.27 13.5H4.23C2.64 13.5 2 14.14 2 15.73V19.77C2 21.36 2.64 22 4.23 22H8.27C9.86 22 10.5 21.36 10.5 19.77Z" stroke="#8F9BB3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15 15.5H21" stroke="#8F9BB3" stroke-width="1.5" stroke-linecap="round"/>
                <path d="M15 19.5H21" stroke="#8F9BB3" stroke-width="1.5" stroke-linecap="round"/>
                </svg>
                ', 'single')
            ),
            array(
                'main' => array('Book', 'books', 'Dashboard', '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M20.4774 17.6714L20.4765 17.6713C20.3335 17.6609 20.2294 17.5327 20.2387 17.4065L19.74 17.37L20.2383 17.4115C20.25 17.2706 20.25 17.1231 20.25 17.0085V17V7C20.25 6.09888 20.2084 5.34503 20.0787 4.72714C19.9479 4.10372 19.72 3.58249 19.3214 3.18306C18.9227 2.78357 18.4018 2.55456 17.7776 2.42281C17.1591 2.29224 16.4038 2.25 15.5 2.25H8.5C7.59618 2.25 6.84091 2.29224 6.22235 2.42281C5.59822 2.55456 5.07727 2.78357 4.67859 3.18306C4.27996 3.58249 4.05213 4.10372 3.92129 4.72714C3.7916 5.34503 3.75 6.09888 3.75 7V18C3.75 18.1339 3.63386 18.25 3.5 18.25C3.36614 18.25 3.25 18.1339 3.25 18V7C3.25 4.81222 3.59065 3.55896 4.3248 2.8248C5.05896 2.09065 6.31222 1.75 8.5 1.75H15.5C17.6878 1.75 18.941 2.09065 19.6752 2.8248C20.4094 3.55896 20.75 4.81222 20.75 7V17C20.75 17.1608 20.7499 17.2947 20.7412 17.4354C20.7299 17.574 20.5959 17.6803 20.4774 17.6714Z" fill="#292D32" stroke="#8F9BB3"/>
                <path d="M20.25 15.75V15.25H19.75H6.35C4.91386 15.25 3.75 16.4139 3.75 17.85V18.5C3.75 20.2961 5.20386 21.75 7 21.75H17C18.7961 21.75 20.25 20.2961 20.25 18.5V15.75ZM17 22.25H7C4.93614 22.25 3.25 20.5639 3.25 18.5V17.85C3.25 16.137 4.64524 14.75 6.35 14.75H20.5C20.6339 14.75 20.75 14.8661 20.75 15V18.5C20.75 20.5639 19.0639 22.25 17 22.25Z" fill="#292D32" stroke="#8F9BB3"/>
                <path d="M16 7.25H8C7.86614 7.25 7.75 7.13386 7.75 7C7.75 6.86614 7.86614 6.75 8 6.75H16C16.1339 6.75 16.25 6.86614 16.25 7C16.25 7.13386 16.1339 7.25 16 7.25Z" fill="#292D32" stroke="#8F9BB3"/>
                <path d="M13 10.75H8C7.86614 10.75 7.75 10.6339 7.75 10.5C7.75 10.3661 7.86614 10.25 8 10.25H13C13.1339 10.25 13.25 10.3661 13.25 10.5C13.25 10.6339 13.1339 10.75 13 10.75Z" fill="#292D32" stroke="#8F9BB3"/>
                </svg>
                ', 'single')
            ),
            array(
                'main' => array('Students', 'students', 'Student', '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M10.05 2.53L4.03002 6.46C2.10002 7.72 2.10002 10.54 4.03002 11.8L10.05 15.73C11.13 16.44 12.91 16.44 13.99 15.73L19.98 11.8C21.9 10.54 21.9 7.73 19.98 6.47L13.99 2.54C12.91 1.82 11.13 1.82 10.05 2.53Z" stroke="#8F9BB3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M5.63 13.08L5.62 17.77C5.62 19.04 6.6 20.4 7.8 20.8L10.99 21.86C11.54 22.04 12.45 22.04 13.01 21.86L16.2 20.8C17.4 20.4 18.38 19.04 18.38 17.77V13.13" stroke="#8F9BB3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21.4 15V9" stroke="#8F9BB3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                ', 'single')
            ),
            array(
                'main' => array('Calendar', 'calendar', 'Dashboard', '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 2V5" stroke="#8F9BB3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M16 2V5" stroke="#8F9BB3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M3.5 9.09H20.5" stroke="#8F9BB3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z" stroke="#8F9BB3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.6947 13.7H15.7037" stroke="#8F9BB3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M15.6947 16.7H15.7037" stroke="#8F9BB3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.9955 13.7H12.0045" stroke="#8F9BB3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M11.9955 16.7H12.0045" stroke="#8F9BB3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.29431 13.7H8.30329" stroke="#8F9BB3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M8.29431 16.7H8.30329" stroke="#8F9BB3" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                ', 'single')
            ),
            array(
                'main' => array('Message', 'messages', 'Dashboard', '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.47 16.83L18.86 19.99C18.96 20.82 18.07 21.4 17.36 20.97L13.17 18.48C12.71 18.48 12.26 18.45 11.82 18.39C12.56 17.52 13 16.42 13 15.23C13 12.39 10.54 10.09 7.49997 10.09C6.33997 10.09 5.26997 10.42 4.37997 11C4.34997 10.75 4.33997 10.5 4.33997 10.24C4.33997 5.68999 8.28997 2 13.17 2C18.05 2 22 5.68999 22 10.24C22 12.94 20.61 15.33 18.47 16.83Z" stroke="#8F9BB3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M13 15.23C13 16.42 12.56 17.52 11.82 18.39C10.83 19.59 9.26 20.36 7.5 20.36L4.89 21.91C4.45 22.18 3.89 21.81 3.95 21.3L4.2 19.33C2.86 18.4 2 16.91 2 15.23C2 13.47 2.94 11.92 4.38 11C5.27 10.42 6.34 10.09 7.5 10.09C10.54 10.09 13 12.39 13 15.23Z" stroke="#8F9BB3" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                ', 'single')
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
