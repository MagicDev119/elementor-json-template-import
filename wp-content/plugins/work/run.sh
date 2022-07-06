#!/bin/bash

# get an admin session cookie (adapt user/pwd as needed)
admin_page=$(curl -L --data 'log=Nazar&pwd=HFfn$E0^USZ&E!*ZUCGbULHo'  -c wpcookie.txt 'https://localhost/wp-login.php')

wp_nonce=$(grep -oPm1 "action=logout&#038;_wpnonce=\K[^']+" <<<$admin_page)
el_nonce=$(grep -oPm1 'var elementorCommonConfig.*"nonce":"\K[^"]+' <<<$admin_page)

echo wp_nonce $wp_nonce
echo el_nonce $el_nonce
echo Upload...
rval=$(curl 'https://localhost/wp-admin/admin-ajax.php' \
  -H "X-WP-NONCE: $wp_nonce" \
  -F action='elementor_import_kit' \
  -F "e_import_file=@elementor-kit.zip;type=application/zip" \
  -F data='{"stage":1}' \
  -F _nonce="$el_nonce" \
  -b wpcookie.txt)

data=$(jq -r '.data' <<< "$rval" )
session=$(jq -r '.session' <<< "$data" )

echo Activate... 
 curl '{wordpress-url}/wp-admin/admin-ajax.php' \
  -H "X-WP-NONCE: $wp_nonce" \
  -F action='elementor_import_kit' \
  -F data='{"stage":2, "session":'"\"$session\""',"include": ["settings","content","templates"],"overrideConditions":[]}' \
  -F _nonce="$el_nonce" \
  -b wpcookie.txt \
  -o output.txt
