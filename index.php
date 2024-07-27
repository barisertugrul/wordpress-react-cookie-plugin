<?php
/*
* Plugin Name: React Cookie Plugin
* Description: This plugin aims to display a GDPR bar to allow/disallow cookies usage.
* Version: 1.0.0
* Author: Barış ERTUĞRUL
* Author URI: http://www.barisertugrul.com
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Load scripts
function rcp_add_scripts() {
    wp_enqueue_script('js-cookies', 'https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js');
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css');
    wp_enqueue_script('react', 'https://unpkg.com/react@16.7.0/umd/react.production.min.js');
    wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom@16.7.0/umd/react-dom.production.min.js');
    wp_enqueue_script('babel', 'https://unpkg.com/babel-standalone@6/babel.min.js');
    wp_enqueue_script('rcp-react-cookie-plugin', plugins_url('/react-cookie-plugin/components/ReactCookiePlugin.js'), array('react', 'react-dom', 'babel'), null, true);

    // Localize script to pass plugin URL to JavaScript
    wp_localize_script('rcp-react-cookie-plugin', 'rcpPluginData', array(
        'pluginUrl' => plugins_url('/react-cookie-plugin/')
    ));
}
add_action('wp_enqueue_scripts', 'rcp_add_scripts');

// Load the cookie banner
include plugin_dir_path(__FILE__) . 'templates/CookieBanner.php';
// Load the cookie bar

/* function rcp_add_cookie_bar() {
    echo '<div id="rcp-cookie-bar" class="rcp-cookie-bar">
        <p>This website uses cookies to ensure you get the best experience on our website.</p>
        <button id="rcp-accept">Accept</button>
        <button id="rcp-decline">Decline</button>
    </div>';
} */

// add_action('wp_footer', 'rcp_add_cookie_bar');



// Load the cookie script

/* function rcp_add_cookie_script() {
    echo '<script>
        window.onload = function() {
            const cookieBar = document.getElementById("rcp-cookie-bar");
            const acceptBtn = document.getElementById("rcp-accept");
            const declineBtn = document.getElementById("rcp-decline");

            acceptBtn.addEventListener("click", () => {
                cookieBar.style.display = "none";
                localStorage.setItem("rcp_cookie_consent", "accepted");
            });

            declineBtn.addEventListener("click", () => {
                cookieBar.style.display = "none";
                localStorage.setItem("rcp_cookie_consent", "declined");
            });

            if (!localStorage.getItem("rcp_cookie_consent")) {
                setTimeout(() => {
                    cookieBar.style.display = "block";
                }, 2000);
            }
        }
    </script>';
} */

// add_action('wp_footer', 'rcp_add_cookie_script');

// Load the cookie script

/* function rcp_check_cookie_consent() {
    if (localStorage.getItem("rcp_cookie_consent") === "declined") {
        echo '<style>
            iframe {
                display: none;
            }
        </style>';
    }
} */

//add_action('wp_footer', 'rcp_check_cookie_consent');



?>