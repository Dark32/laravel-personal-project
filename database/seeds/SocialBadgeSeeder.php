<?php

use App\Models\SocialNetworkBadge;
use Illuminate\Database\Seeder;

class SocialBadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SocialNetworkBadge::insert([
            [
                'name' => 'Вконтакте',
                'slug' => 'vk',
                'description' => '',
                'icon' => '<i class="fab fa-vk"></i>',
                'pattern' => '/^https:\/\/vk.com\/(.*)$/',
            ],
            [
                'name' => 'Facebook',
                'slug' => 'fb',
                'description' => '',
                'icon' => '<i class="fab fa-facebook"></i>',
                'pattern' => '/^https:\/\/www.facebook.com\/(.*)$/',
            ],
            [
                'name' => 'Instagram',
                'slug' => 'instagram',
                'description' => '',
                'icon' => '<i class="fab fa-instagram"></i>',
                'pattern' => '/^https:\/\/www.instagram.com\/(.*)\/$/',
            ],
            [
                'name' => 'twitter',
                'slug' => 'twitter',
                'description' => '',
                'icon' => '<i class="fab fa-twitter"></i>',
                'pattern' => '/^https:\/\/twitter.com\/(.*))$/',
            ],
            [
                'name' => 'twitch',
                'slug' => 'twitch',
                'description' => '',
                'icon' => '<i class="fab fa-twitch"></i>',
                'pattern' => '/^http:\/\/twitch.tv\/(.*)$/',
            ],
            [
                'name' => 'Одноклассники',
                'slug' => 'ok.ru',
                'description' => '',
                'icon' => '<i class="fab fa-odnoklassniki"></i>',
                'pattern' => '/^https:\/\/ok.ru\/profile\/(.*)$/',
            ],
            [
                'name' => 'discord',
                'slug' => 'discord',
                'description' => '',
                'icon' => '<i class="fab fa-discord"></i>',
                'pattern' => '/^(.*)#(\d+)$/',
            ],
            [
                'name' => 'telegram',
                'slug' => 'telegram',
                'description' => '',
                'icon' => '<i class="fab fa-telegram"></i>',
                'pattern' => '/^@(.*)$/',
            ],
            [
                'name' => 'YouTube',
                'slug' => 'youtube',
                'description' => '',
                'icon' => '<i class="fab fa-youtube"></i>',
                'pattern' => '/^https:\/\/www.youtube.com\/channel\/(.*)$/',
            ],
            [
                'name' => 'GitHub',
                'slug' => 'github',
                'description' => '',
                'icon' => '<i class="fab fa-github"></i>',
                'pattern' => '/^https:\/\/github.com\/(.*)$/',
            ],
            [
                'name' => 'GitLab',
                'slug' => 'gitlab',
                'description' => '',
                'icon' => '<i class="fab fa-gitlab"></i>',
                'pattern' => '/^https:\/\/gitlab.com\/(.*))$/',
            ],
            [
                'name' => 'bitbucket',
                'slug' => 'bitbucket',
                'description' => '',
                'icon' => '<i class="fab fa-bitbucket"></i>',
                'pattern' => '/^https:\/\/bitbucket.com\/(.*)\/$/',
            ],
            [
                'name' => 'Steam',
                'slug' => 'steam',
                'description' => '',
                'icon' => '<i class="fab fa-steam"></i>',
                'pattern' => '/^https:\/\/steamcommunity.com/id\/(.*)\/$/',
            ],
            [
                'name' => 'unknow',
                'slug' => 'unknow',
                'description' => '',
                'icon' => '<i class="fas fa-question-circle"></i>',
                'pattern' => '//^(.*)$//',
            ],
        ]);
    }
}
