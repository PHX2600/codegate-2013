<?
function encode( $input )
{
	$enc_tab = array(
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
		'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
		'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
		'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
		'0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '!', '#', '$',
		'%', '&', '(', ')', '*', '+', ',', '.', '/', ':', ';', '<', '=',
		'>', '?', '@', '[', ']', '^', '_', '`', '{', '|', '}', '~', '"'
	);

	for( $index = 0 ; $index < strlen($input) ; $index++ ) {
		$var1 |= ord($input{$index}) << $var2; $var2 += 8;

		if( $var2 > 13 ) {
			$var3 = $var1 & 8191;

			if( $var3 > 88 ) { $var1 >>= 13; $var2 -= 13; }
			else { $var3 = $var1 & 16383; $var1 >>= 14; $var2 -= 14; }

			$output .= $enc_tab[$var3 % 91] . $enc_tab[$var3 / 91];
		}
	}

	if( $var2 ) {
		$output .= $enc_tab[$var1 % 91];

		if( $var2 > 7 || $var1 > 90 ) $output .= $enc_tab[$var1 / 91];
	}

	return $output;
}
?>