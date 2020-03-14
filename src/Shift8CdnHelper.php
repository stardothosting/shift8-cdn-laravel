<?php

/**
 * Handle the Shift8 CDN Link generation
 *
 * @param  Asset file uri path
 * @return Array of CDN urls to the path function
 */
function Shift8Cdn( $asset ){

    // Verify if Shift8 CDN URLs are present in the config file
    if( !Config::get('shift8cdn.url') )
        return asset( $asset );

    // Get file name incl extension and CDN URLs
    $cdns = Config::get('shift8cdn.url');
    $assetName = basename( $asset );

    // Remove query string
    //$assetName = explode("?", $assetName);
    //$assetName = $assetName[0];

    // Select the CDN URL based on the extension
    foreach( $cdns as $cdn => $types ) {
        if( preg_match('/^.*\.(' . $types . ')$/i', $assetName) )
            return Shift8CdnPath($cdn, $asset);
    }

    // In case of no match use the last in the array
    end($cdns);
    return Shift8CdnPath( key( $cdns ) , $asset);

}

/**
 * Handle the Shift8 CDN Link generation
 *
 * @param  CDN path url array, asset file uri path
 * @return Full URL of the static element via Shift8 CDN
 */
function Shift8CdnPath($cdn, $asset) {
    return  "https://" . rtrim($cdn, "/") . "/" . ltrim( $asset, "/");
}