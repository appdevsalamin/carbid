<?php

namespace Database\Seeders\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\SetupPage;
use App\Models\Admin\SiteSections;
use App\Models\Admin\SetupPageHasSection;

class SetupPageHasSectionSeeder extends Seeder
{
    public function run()
    {
       $setup_page_has_sections = array(
        array('setup_page_id' => '2','site_section_id' => '2','position' => '1','status' => '0','created_at' => '2025-08-18 06:23:31','updated_at' => '2025-08-18 06:23:31'),
        array('setup_page_id' => '2','site_section_id' => '3','position' => '2','status' => '0','created_at' => '2025-08-18 06:23:31','updated_at' => '2025-08-18 06:23:31'),
        array('setup_page_id' => '2','site_section_id' => '4','position' => '3','status' => '0','created_at' => '2025-08-18 06:23:31','updated_at' => '2025-08-18 06:23:31'),
        array('setup_page_id' => '2','site_section_id' => '5','position' => '4','status' => '0','created_at' => '2025-08-18 06:23:31','updated_at' => '2025-08-18 06:23:31'),
        array('setup_page_id' => '2','site_section_id' => '6','position' => '5','status' => '0','created_at' => '2025-08-18 06:23:31','updated_at' => '2025-08-18 06:23:31'),
        array('setup_page_id' => '2','site_section_id' => '7','position' => '6','status' => '0','created_at' => '2025-08-18 06:23:31','updated_at' => '2025-08-18 06:23:31'),
        array('setup_page_id' => '2','site_section_id' => '8','position' => '7','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:32'),
        array('setup_page_id' => '2','site_section_id' => '9','position' => '8','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:32'),
        array('setup_page_id' => '2','site_section_id' => '10','position' => '9','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:32'),
        array('setup_page_id' => '2','site_section_id' => '11','position' => '10','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:32'),
        array('setup_page_id' => '2','site_section_id' => '12','position' => '11','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:32'),
        array('setup_page_id' => '2','site_section_id' => '13','position' => '12','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:32'),
        array('setup_page_id' => '2','site_section_id' => '14','position' => '13','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:32'),
        array('setup_page_id' => '2','site_section_id' => '15','position' => '14','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:32'),
        array('setup_page_id' => '2','site_section_id' => '16','position' => '15','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:32'),
        array('setup_page_id' => '2','site_section_id' => '17','position' => '20','status' => '1','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:58'),
        array('setup_page_id' => '2','site_section_id' => '18','position' => '16','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:58'),
        array('setup_page_id' => '2','site_section_id' => '19','position' => '17','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:58'),
        array('setup_page_id' => '2','site_section_id' => '20','position' => '18','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:58'),
        array('setup_page_id' => '2','site_section_id' => '21','position' => '19','status' => '1','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:58'),
        array('setup_page_id' => '2','site_section_id' => '22','position' => '21','status' => '0','created_at' => '2025-08-18 06:23:32','updated_at' => '2025-08-18 06:23:32'),
        array('setup_page_id' => '3','site_section_id' => '2','position' => '1','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '3','position' => '2','status' => '1','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '4','position' => '3','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '5','position' => '4','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '6','position' => '5','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '7','position' => '6','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '8','position' => '7','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '9','position' => '8','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '10','position' => '9','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '11','position' => '10','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '12','position' => '11','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '13','position' => '12','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '14','position' => '13','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '15','position' => '14','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '16','position' => '15','status' => '1','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-19 08:49:48'),
        array('setup_page_id' => '3','site_section_id' => '17','position' => '16','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '18','position' => '17','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '19','position' => '18','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '20','position' => '19','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '21','position' => '20','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '3','site_section_id' => '22','position' => '21','status' => '0','created_at' => '2025-08-18 06:24:13','updated_at' => '2025-08-18 06:24:13'),
        array('setup_page_id' => '5','site_section_id' => '2','position' => '1','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '3','position' => '2','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '4','position' => '3','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '5','position' => '4','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '6','position' => '5','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '7','position' => '6','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '8','position' => '7','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '9','position' => '8','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '10','position' => '9','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '11','position' => '10','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '12','position' => '11','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '13','position' => '12','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '14','position' => '13','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '15','position' => '14','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '16','position' => '15','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '17','position' => '16','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '18','position' => '17','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '19','position' => '18','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '20','position' => '19','status' => '1','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '21','position' => '20','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '5','site_section_id' => '22','position' => '21','status' => '0','created_at' => '2025-08-18 06:24:35','updated_at' => '2025-08-18 06:24:35'),
        array('setup_page_id' => '4','site_section_id' => '2','position' => '1','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '3','position' => '2','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '4','position' => '3','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '5','position' => '4','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '6','position' => '5','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '7','position' => '6','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '8','position' => '7','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '9','position' => '8','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '10','position' => '9','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '11','position' => '10','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '12','position' => '11','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '13','position' => '12','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '14','position' => '13','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '15','position' => '14','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '16','position' => '15','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '17','position' => '16','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '18','position' => '17','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '19','position' => '18','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '20','position' => '19','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '21','position' => '20','status' => '0','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03'),
        array('setup_page_id' => '4','site_section_id' => '22','position' => '21','status' => '1','created_at' => '2025-08-19 08:47:03','updated_at' => '2025-08-19 08:47:03')
        );

        SetupPageHasSection::insert($setup_page_has_sections);
    }
}
