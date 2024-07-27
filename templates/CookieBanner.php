<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="react-cookie-plugin"></div>

<script type="text/babel" src="<?=plugins_url() ?>/react-cookie-plugin/components/ReactCookiePlugin.js"></script>

<script type="text/babel">
    // Ensure rcpPluginData is available
    if (typeof rcpPluginData !== 'undefined') {
        var cookie = Cookies.get("cookiesAllowedFromReactCookiePlugin");
        var declineCookie = Cookies.get("cookiesDeclinedFromReactCookiePlugin");
        if (!cookie && !declineCookie) {
            ReactDOM.render(<ReactCookiePlugin pluginUrl={rcpPluginData.pluginUrl} />, document.querySelector(".react-cookie-plugin"));
        }
    } else {
        console.error('rcpPluginData is not defined');
    }
</script>