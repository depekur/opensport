<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * 
 */

function optionsframework_options() {

	// Post Navigation Links Location
	$post_nav_array = array(
		"disable" => __("Disable", "apprise"),
		"sidebar" => __("Main Sidebar", "apprise"),
		"below" => __("Below Content", "apprise"),

	);
	
	// Post Info Location
	$post_info_array = array(
		"disable" => __("Disable", "apprise"),
		"sidebar" => __("Secondary Sidebar", "apprise"),
		"above" => __("Above Content", "apprise"),

	);
	
	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/admin/images/';
	
	//Portfolio Layout
	$portfolio_layout = array("columns-2" => "2-columns","columns-3" => "3-columns","columns-4" => "4-columns");
	
	//Portfolio Animation
	$portfolio_animation = array("circle" =>"circle","fading" =>"fading","bar" =>"bar","bar2" =>"bar2","bar3" =>"bar3","cover" =>"cover","cover2" =>"cover2","cover3" =>"cover3");
	
	// Google Fonts
	$google_fonts = array(
							"Abel" => "Abel",
							"Abril Fatface" => "Abril Fatface",
							"Aclonica" => "Aclonica",
							"Acme" => "Acme",
							"Actor" => "Actor",
							"Adamina" => "Adamina",
							"Advent Pro" => "Advent Pro",
							"Aguafina Script" => "Aguafina Script",
							"Aladin" => "Aladin",
							"Aldrich" => "Aldrich",
							"Alegreya" => "Alegreya",
							"Alegreya SC" => "Alegreya SC",
							"Alex Brush" => "Alex Brush",
							"Alfa Slab One" => "Alfa Slab One",
							"Alice" => "Alice",
							"Alike" => "Alike",
							"Alike Angular" => "Alike Angular",
							"Allan" => "Allan",
							"Allerta" => "Allerta",
							"Allerta Stencil" => "Allerta Stencil",
							"Allura" => "Allura",
							"Almendra" => "Almendra",
							"Almendra SC" => "Almendra SC",
							"Amaranth" => "Amaranth",
							"Amatic SC" => "Amatic SC",
							"Amethysta" => "Amethysta",
							"Andada" => "Andada",
							"Andika" => "Andika",
							"Angkor" => "Angkor",
							"Annie Use Your Telescope" => "Annie Use Your Telescope",
							"Anonymous Pro" => "Anonymous Pro",
							"Antic" => "Antic",
							"Antic Didone" => "Antic Didone",
							"Antic Slab" => "Antic Slab",
							"Anton" => "Anton",
							"Arapey" => "Arapey",
							"Arbutus" => "Arbutus",
							"Architects Daughter" => "Architects Daughter",
							"Arimo" => "Arimo",
							"Arizonia" => "Arizonia",
							"Armata" => "Armata",
							"Artifika" => "Artifika",
							"Arvo" => "Arvo",
							"Asap" => "Asap",
							"Asset" => "Asset",
							"Astloch" => "Astloch",
							"Asul" => "Asul",
							"Atomic Age" => "Atomic Age",
							"Aubrey" => "Aubrey",
							"Audiowide" => "Audiowide",
							"Average" => "Average",
							"Averia Gruesa Libre" => "Averia Gruesa Libre",
							"Averia Libre" => "Averia Libre",
							"Averia Sans Libre" => "Averia Sans Libre",
							"Averia Serif Libre" => "Averia Serif Libre",
							"Bad Script" => "Bad Script",
							"Balthazar" => "Balthazar",
							"Bangers" => "Bangers",
							"Basic" => "Basic",
							"Battambang" => "Battambang",
							"Baumans" => "Baumans",
							"Bayon" => "Bayon",
							"Belgrano" => "Belgrano",
							"Belleza" => "Belleza",
							"Bentham" => "Bentham",
							"Berkshire Swash" => "Berkshire Swash",
							"Bevan" => "Bevan",
							"Bigshot One" => "Bigshot One",
							"Bilbo" => "Bilbo",
							"Bilbo Swash Caps" => "Bilbo Swash Caps",
							"Bitter" => "Bitter",
							"Black Ops One" => "Black Ops One",
							"Bokor" => "Bokor",
							"Bonbon" => "Bonbon",
							"Boogaloo" => "Boogaloo",
							"Bowlby One" => "Bowlby One",
							"Bowlby One SC" => "Bowlby One SC",
							"Brawler" => "Brawler",
							"Bree Serif" => "Bree Serif",
							"Bubblegum Sans" => "Bubblegum Sans",
							"Buda" => "Buda",
							"Buenard" => "Buenard",
							"Butcherman" => "Butcherman",
							"Butterfly Kids" => "Butterfly Kids",
							"Cabin" => "Cabin",
							"Cabin Condensed" => "Cabin Condensed",
							"Cabin Sketch" => "Cabin Sketch",
							"Caesar Dressing" => "Caesar Dressing",
							"Cagliostro" => "Cagliostro",
							"Calligraffitti" => "Calligraffitti",
							"Cambo" => "Cambo",
							"Candal" => "Candal",
							"Cantarell" => "Cantarell",
							"Cantata One" => "Cantata One",
							"Cardo" => "Cardo",
							"Carme" => "Carme",
							"Carter One" => "Carter One",
							"Caudex" => "Caudex",
							"Cedarville Cursive" => "Cedarville Cursive",
							"Ceviche One" => "Ceviche One",
							"Changa One" => "Changa One",
							"Chango" => "Chango",
							"Chau Philomene One" => "Chau Philomene One",
							"Chelsea Market" => "Chelsea Market",
							"Chenla" => "Chenla",
							"Cherry Cream Soda" => "Cherry Cream Soda",
							"Chewy" => "Chewy",
							"Chicle" => "Chicle",
							"Chivo" => "Chivo",
							"Cinzel Decorative" => "Cinzel Decorative",
							"Coda" => "Coda",
							"Coda Caption" => "Coda Caption",
							"Codystar" => "Codystar",
							"Comfortaa" => "Comfortaa",
							"Coming Soon" => "Coming Soon",
							"Concert One" => "Concert One",
							"Condiment" => "Condiment",
							"Content" => "Content",
							"Contrail One" => "Contrail One",
							"Convergence" => "Convergence",
							"Cookie" => "Cookie",
							"Copse" => "Copse",
							"Corben" => "Corben",
							"Courgette" => "Courgette",
							"Cousine" => "Cousine",
							"Coustard" => "Coustard",
							"Covered By Your Grace" => "Covered By Your Grace",
							"Crafty Girls" => "Crafty Girls",
							"Creepster" => "Creepster",
							"Crete Round" => "Crete Round",
							"Crimson Text" => "Crimson Text",
							"Crushed" => "Crushed",
							"Cuprum" => "Cuprum",
							"Cutive" => "Cutive",
							"Damion" => "Damion",
							"Dancing Script" => "Dancing Script",
							"Dangrek" => "Dangrek",
							"Dawning of a New Day" => "Dawning of a New Day",
							"Days One" => "Days One",
							"Delius" => "Delius",
							"Delius Swash Caps" => "Delius Swash Caps",
							"Delius Unicase" => "Delius Unicase",
							"Della Respira" => "Della Respira",
							"Devonshire" => "Devonshire",
							"Didact Gothic" => "Didact Gothic",
							"Diplomata" => "Diplomata",
							"Diplomata SC" => "Diplomata SC",
							"Doppio One" => "Doppio One",
							"Dorsa" => "Dorsa",
							"Dosis" => "Dosis",
							"Dr Sugiyama" => "Dr Sugiyama",
							"Droid Sans" => "Droid Sans",
							"Droid Sans Mono" => "Droid Sans Mono",
							"Droid Serif" => "Droid Serif",
							"Duru Sans" => "Duru Sans",
							"Dynalight" => "Dynalight",
							"EB Garamond" => "EB Garamond",
							"Eater" => "Eater",
							"Economica" => "Economica",
							"Electrolize" => "Electrolize",
							"Emblema One" => "Emblema One",
							"Emilys Candy" => "Emilys Candy",
							"Engagement" => "Engagement",
							"Enriqueta" => "Enriqueta",
							"Erica One" => "Erica One",
							"Esteban" => "Esteban",
							"Euphoria Script" => "Euphoria Script",
							"Ewert" => "Ewert",
							"Exo" => "Exo",
							"Expletus Sans" => "Expletus Sans",
							"Fanwood Text" => "Fanwood Text",
							"Fascinate" => "Fascinate",
							"Fascinate Inline" => "Fascinate Inline",
							"Federant" => "Federant",
							"Federo" => "Federo",
							"Felipa" => "Felipa",
							"Fjord One" => "Fjord One",
							"Flamenco" => "Flamenco",
							"Flavors" => "Flavors",
							"Fondamento" => "Fondamento",
							"Fontdiner Swanky" => "Fontdiner Swanky",
							"Forum" => "Forum",
							"Francois One" => "Francois One",
							"Fredericka the Great" => "Fredericka the Great",
							"Fredoka One" => "Fredoka One",
							"Freehand" => "Freehand",
							"Fresca" => "Fresca",
							"Frijole" => "Frijole",
							"Fugaz One" => "Fugaz One",
							"GFS Didot" => "GFS Didot",
							"GFS Neohellenic" => "GFS Neohellenic",
							"Galdeano" => "Galdeano",
							"Gentium Basic" => "Gentium Basic",
							"Gentium Book Basic" => "Gentium Book Basic",
							"Geo" => "Geo",
							"Geostar" => "Geostar",
							"Geostar Fill" => "Geostar Fill",
							"Germania One" => "Germania One",
							"Give You Glory" => "Give You Glory",
							"Glass Antiqua" => "Glass Antiqua",
							"Glegoo" => "Glegoo",
							"Gloria Hallelujah" => "Gloria Hallelujah",
							"Goblin One" => "Goblin One",
							"Gochi Hand" => "Gochi Hand",
							"Gorditas" => "Gorditas",
							"Goudy Bookletter 1911" => "Goudy Bookletter 1911",
							"Graduate" => "Graduate",
							"Gravitas One" => "Gravitas One",
							"Great Vibes" => "Great Vibes",
							"Gruppo" => "Gruppo",
							"Gudea" => "Gudea",
							"Habibi" => "Habibi",
							"Hammersmith One" => "Hammersmith One",
							"Handlee" => "Handlee",
							"Hanuman" => "Hanuman",
							"Happy Monkey" => "Happy Monkey",
							"Henny Penny" => "Henny Penny",
							"Herr Von Muellerhoff" => "Herr Von Muellerhoff",
							"Holtwood One SC" => "Holtwood One SC",
							"Homemade Apple" => "Homemade Apple",
							"Homenaje" => "Homenaje",
							"IM Fell DW Pica" => "IM Fell DW Pica",
							"IM Fell DW Pica SC" => "IM Fell DW Pica SC",
							"IM Fell Double Pica" => "IM Fell Double Pica",
							"IM Fell Double Pica SC" => "IM Fell Double Pica SC",
							"IM Fell English" => "IM Fell English",
							"IM Fell English SC" => "IM Fell English SC",
							"IM Fell French Canon" => "IM Fell French Canon",
							"IM Fell French Canon SC" => "IM Fell French Canon SC",
							"IM Fell Great Primer" => "IM Fell Great Primer",
							"IM Fell Great Primer SC" => "IM Fell Great Primer SC",
							"Iceberg" => "Iceberg",
							"Iceland" => "Iceland",
							"Imprima" => "Imprima",
							"Inconsolata" => "Inconsolata",
							"Inder" => "Inder",
							"Indie Flower" => "Indie Flower",
							"Inika" => "Inika",
							"Irish Grover" => "Irish Grover",
							"Istok Web" => "Istok Web",
							"Italiana" => "Italiana",
							"Italianno" => "Italianno",
							"Jim Nightshade" => "Jim Nightshade",
							"Jockey One" => "Jockey One",
							"Jolly Lodger" => "Jolly Lodger",
							"Josefin Sans" => "Josefin Sans",
							"Josefin Slab" => "Josefin Slab",
							"Judson" => "Judson",
							"Julee" => "Julee",
							"Junge" => "Junge",
							"Jura" => "Jura",
							"Just Another Hand" => "Just Another Hand",
							"Just Me Again Down Here" => "Just Me Again Down Here",
							"Kameron" => "Kameron",
							"Karla" => "Karla",
							"Kaushan Script" => "Kaushan Script",
							"Kelly Slab" => "Kelly Slab",
							"Kenia" => "Kenia",
							"Khmer" => "Khmer",
							"Knewave" => "Knewave",
							"Kotta One" => "Kotta One",
							"Koulen" => "Koulen",
							"Kranky" => "Kranky",
							"Kreon" => "Kreon",
							"Kristi" => "Kristi",
							"Krona One" => "Krona One",
							"La Belle Aurore" => "La Belle Aurore",
							"Lancelot" => "Lancelot",
							"Lato" => "Lato",
							"League Script" => "League Script",
							"Leckerli One" => "Leckerli One",
							"Ledger" => "Ledger",
							"Lekton" => "Lekton",
							"Lemon" => "Lemon",
							"Lilita One" => "Lilita One",
							"Limelight" => "Limelight",
							"Linden Hill" => "Linden Hill",
							"Lobster" => "Lobster",
							"Lobster Two" => "Lobster Two",
							"Londrina Outline" => "Londrina Outline",
							"Londrina Shadow" => "Londrina Shadow",
							"Londrina Sketch" => "Londrina Sketch",
							"Londrina Solid" => "Londrina Solid",
							"Lora" => "Lora",
							"Love Ya Like A Sister" => "Love Ya Like A Sister",
							"Loved by the King" => "Loved by the King",
							"Lovers Quarrel" => "Lovers Quarrel",
							"Luckiest Guy" => "Luckiest Guy",
							"Lusitana" => "Lusitana",
							"Lustria" => "Lustria",
							"Macondo" => "Macondo",
							"Macondo Swash Caps" => "Macondo Swash Caps",
							"Magra" => "Magra",
							"Maiden Orange" => "Maiden Orange",
							"Mako" => "Mako",
							"Marck Script" => "Marck Script",
							"Marko One" => "Marko One",
							"Marmelad" => "Marmelad",
							"Marvel" => "Marvel",
							"Mate" => "Mate",
							"Mate SC" => "Mate SC",
							"Maven Pro" => "Maven Pro",
							"Meddon" => "Meddon",
							"MedievalSharp" => "MedievalSharp",
							"Medula One" => "Medula One",
							"Megrim" => "Megrim",
							"Merienda One" => "Merienda One",
							"Merriweather" => "Merriweather",
							"Metal" => "Metal",
							"Metamorphous" => "Metamorphous",
							"Metrophobic" => "Metrophobic",
							"Michroma" => "Michroma",
							"Miltonian" => "Miltonian",
							"Miltonian Tattoo" => "Miltonian Tattoo",
							"Miniver" => "Miniver",
							"Miss Fajardose" => "Miss Fajardose",
							"Modern Antiqua" => "Modern Antiqua",
							"Molengo" => "Molengo",
							"Monofett" => "Monofett",
							"Monoton" => "Monoton",
							"Monsieur La Doulaise" => "Monsieur La Doulaise",
							"Montaga" => "Montaga",
							"Montez" => "Montez",
							"Montserrat" => "Montserrat",
							"Moul" => "Moul",
							"Moulpali" => "Moulpali",
							"Mountains of Christmas" => "Mountains of Christmas",
							"Mr Bedfort" => "Mr Bedfort",
							"Mr Dafoe" => "Mr Dafoe",
							"Mr De Haviland" => "Mr De Haviland",
							"Mrs Saint Delafield" => "Mrs Saint Delafield",
							"Mrs Sheppards" => "Mrs Sheppards",
							"Muli" => "Muli",
							"Mystery Quest" => "Mystery Quest",
							"Neucha" => "Neucha",
							"Neuton" => "Neuton",
							"News Cycle" => "News Cycle",
							"Niconne" => "Niconne",
							"Nixie One" => "Nixie One",
							"Nobile" => "Nobile",
							"Nokora" => "Nokora",
							"Norican" => "Norican",
							"Nosifer" => "Nosifer",
							"Nothing You Could Do" => "Nothing You Could Do",
							"Noticia Text" => "Noticia Text",
							"Nova Cut" => "Nova Cut",
							"Nova Flat" => "Nova Flat",
							"Nova Mono" => "Nova Mono",
							"Nova Oval" => "Nova Oval",
							"Nova Round" => "Nova Round",
							"Nova Script" => "Nova Script",
							"Nova Slim" => "Nova Slim",
							"Nova Square" => "Nova Square",
							"Numans" => "Numans",
							"Nunito" => "Nunito",
							"Odor Mean Chey" => "Odor Mean Chey",
							"Old Standard TT" => "Old Standard TT",
							"Oldenburg" => "Oldenburg",
							"Oleo Script" => "Oleo Script",
							"Oleo Script Swash Caps" => "Oleo Script Swash Caps",
							"Open Sans" => "Open Sans",
							"Open Sans Condensed" => "Open Sans Condensed",
							"Orbitron" => "Orbitron",
							"Original Surfer" => "Original Surfer",
							"Oswald" => "Oswald",
							"Over the Rainbow" => "Over the Rainbow",
							"Overlock" => "Overlock",
							"Overlock SC" => "Overlock SC",
							"Ovo" => "Ovo",
							"Oxygen" => "Oxygen",
							"PT Mono" => "PT Mono",
							"PT Sans" => "PT Sans",
							"PT Sans Caption" => "PT Sans Caption",
							"PT Sans Narrow" => "PT Sans Narrow",
							"PT Serif" => "PT Serif",
							"PT Serif Caption" => "PT Serif Caption",
							"Pacifico" => "Pacifico",
							"Parisienne" => "Parisienne",
							"Passero One" => "Passero One",
							"Passion One" => "Passion One",
							"Patrick Hand" => "Patrick Hand",
							"Patua One" => "Patua One",
							"Paytone One" => "Paytone One",
							"Permanent Marker" => "Permanent Marker",
							"Petrona" => "Petrona",
							"Philosopher" => "Philosopher",
							"Piedra" => "Piedra",
							"Pinyon Script" => "Pinyon Script",
							"Plaster" => "Plaster",
							"Play" => "Play",
							"Playball" => "Playball",
							"Playfair Display" => "Playfair Display",
							"Petit Formal Script" => "Petit Formal Script",
							"Podkova" => "Podkova",
							"Poiret One" => "Poiret One",
							"Poller One" => "Poller One",
							"Poly" => "Poly",
							"Pompiere" => "Pompiere",
							"Pontano Sans" => "Pontano Sans",
							"Port Lligat Sans" => "Port Lligat Sans",
							"Port Lligat Slab" => "Port Lligat Slab",
							"Prata" => "Prata",
							"Preahvihear" => "Preahvihear",
							"Press Start 2P" => "Press Start 2P",
							"Princess Sofia" => "Princess Sofia",
							"Prociono" => "Prociono",
							"Prosto One" => "Prosto One",
							"Puritan" => "Puritan",
							"Quantico" => "Quantico",
							"Quattrocento" => "Quattrocento",
							"Quattrocento Sans" => "Quattrocento Sans",
							"Questrial" => "Questrial",
							"Quicksand" => "Quicksand",
							"Qwigley" => "Qwigley",
							"Radley" => "Radley",
							"Raleway" => "Raleway",
							"Rammetto One" => "Rammetto One",
							"Rancho" => "Rancho",
							"Rationale" => "Rationale",
							"Redressed" => "Redressed",
							"Reenie Beanie" => "Reenie Beanie",
							"Revalia" => "Revalia",
							"Ribeye" => "Ribeye",
							"Ribeye Marrow" => "Ribeye Marrow",
							"Righteous" => "Righteous",
							"Roboto Slab" => "Roboto Slab",
							"Rochester" => "Rochester",
							"Rock Salt" => "Rock Salt",
							"Rokkitt" => "Rokkitt",
							"Ropa Sans" => "Ropa Sans",
							"Rosario" => "Rosario",
							"Rosarivo" => "Rosarivo",
							"Rouge Script" => "Rouge Script",
							"Ruda" => "Ruda",
							"Ruge Boogie" => "Ruge Boogie",
							"Ruluko" => "Ruluko",
							"Ruslan Display" => "Ruslan Display",
							"Russo One" => "Russo One",
							"Ruthie" => "Ruthie",
							"Sail" => "Sail",
							"Salsa" => "Salsa",
							"Sancreek" => "Sancreek",
							"Sansita One" => "Sansita One",
							"Sarina" => "Sarina",
							"Satisfy" => "Satisfy",
							"Schoolbell" => "Schoolbell",
							"Seaweed Script" => "Seaweed Script",
							"Sevillana" => "Sevillana",
							"Shadows Into Light" => "Shadows Into Light",
							"Shadows Into Light Two" => "Shadows Into Light Two",
							"Shanti" => "Shanti",
							"Share" => "Share",
							"Shojumaru" => "Shojumaru",
							"Short Stack" => "Short Stack",
							"Siemreap" => "Siemreap",
							"Sigmar One" => "Sigmar One",
							"Signika" => "Signika",
							"Signika Negative" => "Signika Negative",
							"Simonetta" => "Simonetta",
							"Sirin Stencil" => "Sirin Stencil",
							"Six Caps" => "Six Caps",
							"Slackey" => "Slackey",
							"Smokum" => "Smokum",
							"Smythe" => "Smythe",
							"Sniglet" => "Sniglet",
							"Snippet" => "Snippet",
							"Sofia" => "Sofia",
							"Sonsie One" => "Sonsie One",
							"Sorts Mill Goudy" => "Sorts Mill Goudy",
							"Special Elite" => "Special Elite",
							"Spicy Rice" => "Spicy Rice",
							"Spinnaker" => "Spinnaker",
							"Spirax" => "Spirax",
							"Squada One" => "Squada One",
							"Stardos Stencil" => "Stardos Stencil",
							"Stint Ultra Condensed" => "Stint Ultra Condensed",
							"Stint Ultra Expanded" => "Stint Ultra Expanded",
							"Stoke" => "Stoke",
							"Sue Ellen Francisco" => "Sue Ellen Francisco",
							"Sunshiney" => "Sunshiney",
							"Supermercado One" => "Supermercado One",
							"Suwannaphum" => "Suwannaphum",
							"Swanky and Moo Moo" => "Swanky and Moo Moo",
							"Syncopate" => "Syncopate",
							"Tangerine" => "Tangerine",
							"Taprom" => "Taprom",
							"Telex" => "Telex",
							"Tenor Sans" => "Tenor Sans",
							"The Girl Next Door" => "The Girl Next Door",
							"Tienne" => "Tienne",
							"Tinos" => "Tinos",
							"Titan One" => "Titan One",
							"Trade Winds" => "Trade Winds",
							"Trocchi" => "Trocchi",
							"Trochut" => "Trochut",
							"Trykker" => "Trykker",
							"Tulpen One" => "Tulpen One",
							"Ubuntu" => "Ubuntu",
							"Ubuntu Condensed" => "Ubuntu Condensed",
							"Ubuntu Mono" => "Ubuntu Mono",
							"Ultra" => "Ultra",
							"Uncial Antiqua" => "Uncial Antiqua",
							"UnifrakturCook" => "UnifrakturCook",
							"UnifrakturMaguntia" => "UnifrakturMaguntia",
							"Unkempt" => "Unkempt",
							"Unlock" => "Unlock",
							"Unna" => "Unna",
							"VT323" => "VT323",
							"Varela" => "Varela",
							"Varela Round" => "Varela Round",
							"Vast Shadow" => "Vast Shadow",
							"Vibur" => "Vibur",
							"Vidaloka" => "Vidaloka",
							"Viga" => "Viga",
							"Voces" => "Voces",
							"Volkhov" => "Volkhov",
							"Vollkorn" => "Vollkorn",
							"Voltaire" => "Voltaire",
							"Waiting for the Sunrise" => "Waiting for the Sunrise",
							"Wallpoet" => "Wallpoet",
							"Walter Turncoat" => "Walter Turncoat",
							"Wellfleet" => "Wellfleet",
							"Wire One" => "Wire One",
							"Yanone Kaffeesatz" => "Yanone Kaffeesatz",
							"Yellowtail" => "Yellowtail",
							"Yeseva One" => "Yeseva One",
							"Yesteryear" => "Yesteryear",
							"Zeyada" => "Zeyada",					
					);

	// Options Enable/Disable
	$options_enable = array(
						"Enable" => "Enable",
						"Disable" => "Disable",	
					);

	// Positions
	$positions = array(
						"Left" => "Left",
						"Right" => "Right",	
					);
										
	// Excerpt or Full Blog Content
	$options_content = array(
						"Excerpt" => "Excerpt",
						"Full Content" => "Full Content",	
					);
					
	// Image Sliders
	$slider_select = array("flex" => "Flex Slider", "refine" => "Refine Slider");
	
	// Featured Posts Display
	$options_feat_posts = array("grid" => "Grid", "slider" => "Image Slider");
	
	// Animation Effecta
	$animation_effects = array("fade" => "fade", "random" => "random", "slideV" => "slideV", "slideH" => "slideH", "sliceV" => "sliceV", "sliceH" => "sliceH", "cubeV" => "cubeV", "cubeH" => "cubeH", "scale" => "scale", "kaleidoscope" => "kaleidoscope", "fan" => "fan", "blindV" => "blindV", "blindH" => "blindH");

	// Font Sizes
	$font_sizes = array(
		'10' => '10',
		'11' => '11',
		'12' => '12',
		'13' => '13',
		'14' => '14',
		'15' => '15',
		'16' => '16',
		'17' => '17',
		'18' => '18',
		'19' => '19',
		'20' => '20',
		'21' => '21',
		'22' => '22',
		'23' => '23',
		'24' => '24',
		'25' => '25',
		'26' => '26',
		'27' => '27',
		'28' => '28',
		'29' => '29',
		'30' => '30',
		'31' => '31',
		'32' => '32',
		'33' => '33',
		'34' => '34',
		'35' => '35',
		'36' => '36',
		'37' => '37',
		'38' => '38',
		'39' => '39',
		'40' => '40',
		'41' => '41',
		'42' => '42',
	);
	
	// Button Colors
	$button_colors = array("green" => "green","darkgreen" => "darkgreen","orange" => "orange", "blue" => "blue", "red" => "red" ,"pink" => "pink", "darkgray" => "darkgray","lightgray" => "lightgray");
	

	$options = array();

	// General Settings
	$options[] = array(
		"name" => __("General","apprise"),
		"type" => "heading");

	$options[] = array( "name" 	=> __("Enable Custom Favicon","apprise"),
		"desc" => "",
		"id" => "enable_favicon",
		"std" => "0",
		"type" => "checkbox");

	$options[] = array( "name" => __("Custom Favicon","apprise"),
		"desc" => "You can upload a favicon for your theme, or specify a favicon image URL directly. Image size should be (16px x 16px)",
		"id" => "favicon",
		"mod" => "min",
		"type" => "upload");

	$options[] = array( "name" 	=> __("Comments","apprise"),
		"desc" => "",
		"id" => "enable_comments",
		"std" => "1",
		"type" => "checkbox");
		
	$options[] = array( "name" 	=> __("Breadcrumbs","apprise"),
		"desc" => "",
		"id" => "enable_breadcrumbs",
		"std" => "1",
		"type" => "checkbox");
	
	$options[] = array( "name" 	=> __("Responsive Design","apprise"),
		"desc" => "",
		"id" => "responsive_design",
		"std" => "1",
		"type" => "checkbox");
		
	$options[] = array( "name" 	=> __("ScrollUp","apprise"),
		"desc" => "",
		"id" => "enable_scrollup",
		"std" => "1",
		"type" => "checkbox");
		
	$options[] = array( "name" => __("ScrollUp Color","apprise"),
		"desc" => "Pick the color (default is #888888)",
		"id" => "scrollup_color",
		"std" => "#888888",
		"type" => "color");
		
	$options[] = array( "name" => __("ScrollUp Hover Color","apprise"),
		"desc" => "Pick the color (default is #999999)",
		"id" => "scrollup_hover_color",
		"std" => "#999999",
		"type" => "color");

	// Logo Settings
	$options[] = array(
		"name" => __("Logo", "apprise"),
		"type" => "heading");

	$options[] = array( "name" => __("Logo Width (px)","apprise"),
		"desc" => "Default is 350",
		"id" => "logo_width",
		"std" => "350",
		"class" => "mini",
		"type" => "text");
		
	$options[] = array( "name" => __("Logo Height (px)","apprise"),
		"desc" => "Default is 80",
		"id" => "logo_height",
		"std" => "80",
		"class" => "mini",
		"type" => "text");

	$options[] = array( "name" => __("Logo Top Margin (px)","apprise"),
		"desc" => "Default is 25",
		"id" => "logo_top_margin",
		"std" => "25",
		"class" => "mini",
		"type" => "text");
		
	$options[] = array( "name" => __("Logo Left Margin (px)","apprise"),
		"desc" => "Default is 0",
		"id" => "logo_left_margin",
		"std" => "0",
		"class" => "mini",
		"type" => "text");
		
	$options[] = array( "name" => __("Logo Bottom Margin (px)","apprise"),
		"desc" => "Default is 25",
		"id" => "logo_bottom_margin",
		"std" => "25",
		"class" => "mini",
		"type" => "text");
		
	$options[] = array( "name" => __("Logo Right Margin (px)","apprise"),
		"desc" => "Default is 25",
		"id" => "logo_right_margin",
		"std" => "25",
		"class" => "mini",
		"type" => "text");
		
	$options[] = array( "name" => __("Image Logo","apprise"),
		"desc" => "You can upload a logo for your theme, or specify an image URL directly",
		"id" => "logo",
		"mod" => "min",
		"type" => "upload");

	$options[] = array( "name" => __("Logo ALT Text","apprise"),
		"desc" => "Specifies an alternate text for the logo",
		"id" => "logo_alt_text",
		"std" => "Logo",
		"type" => "text");

	$options[] = array( "name" 	=> __("Logo Uppercase","apprise"),
		"desc" => "",
		"id" => "logo_uppercase",
		"std" => "1",
		"type" => "checkbox");
		
	$options[] = array( "name" => __("Select Logo Font Family","apprise"),
		"desc" => "Select logo font family",
		"id" => "google_font_logo",
		"std" => "Open Sans",
		"type" => "select",
		"options" => $google_fonts); 

	$options[] = array( "name" => __("Logo Font Size (px)","apprise"),
		"desc" => "Default is 50",
		"id" => "logo_font_size",
		"std" => "50",
		"class" => "mini",
		"type" => "text");
		
	$options[] = array( "name" => __("Logo Font Weight","apprise"),
		"desc" => "Defines from thin to thick characters (100 to 900)",
		"id" => "logo_font_weight",
		"std" => "700",
		"class" => "mini",
		"type" => "text");
		
	$options[] = array( "name" => __("Logo Color","apprise"),
		"desc" => "Pick logo color (default is #000000)",
		"id" => "text_logo_color",
		"std" => "#000000",
		"type" => "color");

	$options[] = array( "name" 	=> __("Enable Tagline Underneath Logo","apprise"),
		"desc" => "",
		"id" => "enable_logo_tagline",
		"std" => "1",
		"type" => "checkbox");
	
	$options[] = array( "name" => __("Tagline Font Size (px)","apprise"),
		"desc" => "Default is 16",
		"id" => "tagline_font_size",
		"std" => "16",
		"class" => "mini",
		"type" => "text");
		
	$options[] = array( "name" => __("Tagline Color","apprise"),
		"desc" => "Pick tagline color (default is #000000)",
		"id" => "tagline_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" 	=> __("Tagline Uppercase","apprise"),
		"desc" => "",
		"id" => "tagline_uppercase",
		"std" => "1",
		"type" => "checkbox");

	// Navigation Menu
	$options[] = array(
		"name" => __("Navigation", "apprise"),
		"type" => "heading");

	$options[] = array( "name" => __("Select Main Navigation Menu Font Family","apprise"),
		"desc" => "Select a font family for the main navigation menu",
		"id" => "google_font_menu",
		"std" => "Open Sans",
		"type" => "select",
		"options" => $google_fonts); 
		
	$options[] = array( "name" 	=> __("Main Navigation Menu Font Size (px)","apprise"),
		"desc" => "Select the font size, default value: 14",
		"id" => "nav_font_size",
		"std" => "14",
		"class" => "mini",
		"type" => "text");
		
	$options[] = array( "name" 	=> __("Uppercase Menu","apprise"),
		"desc" => "",
		"id" => "menu_uppercase",
		"std" => "0",
		"type" => "checkbox");

	$options[] = array( "name" => __("Main Navigation Menu Font Color","apprise"),
		"desc" => "Pick a main navigation menu font color (default is #ffffff)",
		"id" => "nav_font_color",
		"std" => "#ffffff",
		"type" => "color");
					
	$options[] = array( "name" => __("Main Navigation Menu Background Color","apprise"),
		"desc" => "Pick a background color for the main navigation menu (default is #111111)",
		"id" => "nav_bg_color",
		"std" => "#111111",
		"type" => "color");

	$options[] = array( "name" => __("Main Navigation Menu Hover Font Color","apprise"),
		"desc" => "Pick a main navigation menu hover font color (default is #000000)",
		"id" => "nav_hover_font_color",
		"std" => "#000000",
		"type" => "color");

	$options[] = array( "name" => __("Main Navigation Menu Background Hover Color","apprise"),
		"desc" => "Pick a background hover color for the main navigation menu (default #8db529)",
		"id" => "nav_bg_hover_color",
		"std" => "#8db529",
		"type" => "color");
		
	$options[] = array( "name" => __("Main Navigation Selected Menu Color","apprise"),
		"desc" => "Pick a selected menu item color (default #fcf414)",
		"id" => "nav_cur_item_color",
		"std" => "#fcf414",
		"type" => "color");
						
	// Typography Settings
	$options[] = array(
		"name" => __("Typography", "apprise"),
		"type" => "heading");

	$options[] = array( "name" => __("Select Body Font Family","apprise"),
		"desc" => "Select a font family for body text",
		"id" => "google_font_body",
		"std" => "Open Sans",
		"type" => "select",
		"options" => $google_fonts); 

	$options[] = array( "name" => __("Body Font Size (px)","apprise"),
		"desc" => "Default is 14",
		"id" => "body_font_size",
		"std" => "14",
		"type" => "select",
		"options" => $font_sizes);

	$options[] = array( "name" =>  __("Body Font Color","apprise"),
		"desc" => "Pick body font color. ( Default: #444444 )",
		"id" => "body_font_color",
		"std" => "#444444",
		"type" => "color");						

	// Header Settings
	$options[] = array(
		"name" => __("Header", "apprise"),
		"type" => "heading");

	$options[] = array( "name" => __("Header Social Links","apprise"),
		"desc" => "Enable or Disable header social links",
		"id" => "header_social_enable",
		"std" => "1",
		"type" => "checkbox");
		
	$options[] = array( "name" =>  __("Header Social Links Color","apprise"),
		"desc" => "Pick social links icons color. ( Default: #000000 )",
		"id" => "header_social_color",
		"std" => "#000000",
		"type" => "color");
	
	if(class_exists('Woocommerce')) {
		$options[] = array( "name" => __("Shopping Cart","apprise"),
			"desc" => "Enable or Disable shopping cart.",
			"id" => "shopping_cart_enable",
			"std" => "1",
			"type" => "checkbox");
	}
										
	// Home Page Settings
	$options[] = array(
		"name" => __("Home Page", "apprise"),
		"type" => "heading");

	$options[] = array( "name" => __("Enable Featured Posts on Home Page","apprise"),
		"desc" => "",
		"id" => "featured_posts_on",
		"std" => "1",
		"type" => "checkbox"); 

	$options[] = array( "name" => __("Display Featured Posts as Image Slider","apprise"),
		"desc" => "",
		"id" => "image_slider_on",
		"std" => "0",
		"type" => "checkbox");

	$options[] = array( "name" => __("Select Featured Posts Category","apprise"),
		"desc" => "",
		"id" => "slider_cat",
		"std" => "",
		"type" => "select",
		"options" => $options_categories);	
		
	$options[] = array( "name" => __("Display About Section on Home Page","apprise"),
		"desc" => "",
		"id" => "about_section_on",
		"std" => "0",
		"type" => "checkbox");	

	$options[] = array( "name"	=> __("About Section Header Text","apprise"),
		"desc" => "",
		"id" => "about_section_header",
		"std" => "About Us",
		"type" => "text");
		
	$options[] = array( "name"	=> __("About Section Text","apprise"),
		"desc" => "",
		"id" => "about_section_text",
		"std" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
		"type" => "textarea");		

	$options[] = array( "name" => __("Display Content Boxes Section on Home Page","apprise"),
		"desc" => "",
		"id" => "content_boxes_section_on",
		"std" => "0",
		"type" => "checkbox");
		
	$options[] = array( "name" => __("Display Blog Posts on Home Page","apprise"),
		"desc" => "",
		"id" => "blog_posts_on",
		"std" => "1",
		"type" => "checkbox");
											
	// Image Slider Settings
	$options[] = array(
		"name" => __("Image Slider", "apprise"),
		"type" => "heading");
		
	$options[] = array( "name" => __("Slider Animation Effect:", "apprise"),
		"desc" => "",
		"id" => "slider_animation",
		"std" => "fade",
		"type" => "select",
		"options" => $animation_effects);
		
	$options[] = array( "name" => __("Slideshow Speed", "apprise"),
		"desc" => "Select the slideshow speed, 1000 = 1 second, default value: 5000",
		"id" => "slideshow_speed",
		"std" => "5000",
		"class" => "mini",
		"type" => "text");
					
	$options[] = array( "name" => __("Animation Speed", "apprise"),
		"desc" => "Select the animation speed, 1000 = 1 second, default value: 800",
		"id" => "animation_speed",
		"std" => "800",
		"class" => "mini",
		"type" => "text" );

	$options[] = array( "name" => __("Number of Slides to Display", "apprise"),
		"desc" => "",
		"id" => "slider_num",
		"std" => "3",
		"class" => "mini",
		"type" => "text" );

	$options[] = array("name" => __("Slider Captions", "apprise"),
		"desc" => "Enable/Disable captions on a slide",
		"id" => "captions",
		"std" => "0",
		"type" => "checkbox");
		
	// Footer Options
	$options[] = array(
		"name" => __("Footer", "apprise"),
		"type" => "heading");

	$options[] = array( "name" => __("Footer Background Color","apprise"),
		"desc" => "Pick a background color (default is #000000)",
		"id" => "footer_bg_color",
		"std" => "#000000",
		"type" => "color");

	$options[] = array( "name" => __("Copyright Section Background Color","apprise"),
		"desc" => "Pick a background color (default is #262C33)",
		"id" => "copyright_bg_color",
		"std" => "#262C33",
		"type" => "color");

	$options[] = array( "name" => __("Footer Widget Title Color","apprise"),
		"desc" => "Pick a widget title color (default is #8DB529)",
		"id" => "footer_widget_title_color",
		"std" => "#8DB529",
		"type" => "color");
		
	$options[] = array( "name" => __("Footer Widget Title Border Color","apprise"),
		"desc" => "Pick a widget title border color (default is #8DB529)",
		"id" => "footer_widget_title_border_color",
		"std" => "#8DB529",
		"type" => "color");
		
	$options[] = array( "name" => __("Footer Widget Text Color","apprise"),
		"desc" => "Pick a widget text color (default is #FFFFFF)",
		"id" => "footer_widget_text_color",
		"std" => "#FFFFFF",
		"type" => "color");
		
	$options[] = array( "name" => __("Footer Widget Text Border Color","apprise"),
		"desc" => "Pick a widget text border color (default is #EAEAEA)",
		"id" => "footer_widget_text_border_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" => __("Footer Widgets","apprise"),
		"desc" 		=> "Turn On / Off footer widgets ",
		"id" 		=> "footer_widgets",
		"std" 		=> "1",
		"type" 		=> "checkbox");
		
	$options[] = array( "name" => __("Copyright Text","apprise"),
         "desc" => "",
         "id" => "footer_copyright_text",
         "std" => 'Copyright '.date('Y').' '.get_bloginfo('site_title'),
         "type" => "textarea");

	// Layout Options
	$options[] = array(
		"name" => __("Layout", "apprise"),
		"type" => "heading");
		
	$options[] = array(
		'name' => "Select the Layout",
		'desc' => "",
		'id' => "layout_settings",
		'std' => "col2-l",
		'type' => "images",
		'options' => array(
			'col1' => $imagepath . 'col-1c.png',
			'col2-l' => $imagepath . 'col-2cl.png',
			'col2-r' => $imagepath . 'col-2cr.png',
			'col3-l' => $imagepath . 'col-3cl.png',
			'col3-m' => $imagepath . 'col-3cm.png',
			'col3-r' => $imagepath . 'col-3cr.png')
	);

	// Blog Options
	$options[] = array(
		"name" => __("Blog Options", "apprise"),
		"type" => "heading");

	$options[] = array( "name" 	=> __("Excerpt or Full Blog Content","apprise"),
		"desc" => "Show excerpt or full blog content on archive / blog pages",
		"id" => "blog_content",
		"std" => "Excerpt",
		"options" => $options_content,
		"type" => "select");
		
	$options[] = array( "name"	=> __("Blog Excerpt Length","apprise"),
		"desc" => "Default: 50",
		"id" => "blog_excerpt",
		"std" => "50",
		"class" => "mini",
		"type" => "text");
		
	$options[] = array( "name" 	=> __("Use Simple Pagination","apprise"),
		"desc" => "Enable/Disable simple pagination",
		"id" => "simple_paginaton",
		"std" => "0",
		"type" => "checkbox");
		
	$options[] = array(
		"name" => __("Post Navigation Links", "apprise"),
		"desc" => "Shows links to the next and previous article",
		"id" => "post_navigation",
		"std" => "sidebar",
		"type" => "radio",
		"options" => $post_nav_array);
		
	$options[] = array(
		"name" => __("Post Info", "apprise"),
		"desc" => "Shows post info",
		"id" => "post_info",
		"std" => "above",
		"type" => "radio",
		"options" => $post_info_array);
		
	$options[] = array( "name" 	=> __("Display Featured Image Inside the Post","apprise"),
		"desc" => "Enable/Disable featured image inside the post",
		"id" => "featured_img_post",
		"std" => "1",
		"type" => "checkbox");
		
	$options[] = array(
		'name' => __('Post Info Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Post Info Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "post_info_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Post Info Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "post_info_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Post Info Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "post_info_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name"	=> __("Post Info Header","apprise"),
		"desc" => "",
		"id" => "post_info_header",
		"std" => "Post Info",
		"type" => "text");

	// Content Boxes Settings
	$options[] = array(
		"name" => __("Content Boxes", "apprise"),
		"type" => "heading");
		
	$options[] = array( "name" => __("First Column Header", "apprise"),
		"desc" => "Enter text to display in the header of the first column",
		"id" => "first_column_header",
		"std" => "Responsive Design",
		"type" => "text");
		
	$options[] = array( "name" => __("First Column Text", "apprise"),
		"desc" => "Enter text to display in the body of the first column",
		"id" => "first_column_text",
		"std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
		"type" => "textarea");
		
	$options[] = array( "name" => __("First Column Image", "apprise"),
		"desc" => sprintf( __( 'Enter Font Awesome icon name. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'apprise' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
		"id" => "first_column_image",
		"std" => "fa-tablet",
		"type" => "text");
		
	$options[] = array( "name" => __("Second Column Header", "apprise"),
		"desc" => "Enter text to display in the header of the second column",
		"id" => "second_column_header",
		"std" => "High Quality",
		"type" => "text");
		
	$options[] = array( "name" => __("Second Column Text", "apprise"),
		"desc" => "Enter text to display in the body of the second column",
		"id" => "second_column_text",
		"std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
		"type" => "textarea");
		
	$options[] = array( "name" => __("Second Column Image", "apprise"),
		"desc" => sprintf( __( 'Enter Font Awesome icon name. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'apprise' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
		"id" => "second_column_image",
		"std" => "fa-umbrella",
		"type" => "text");
		
	$options[] = array( "name" => __("Third Column Header", "apprise"),
		"desc" => "Enter text to display in the header of the third column",
		"id" => "third_column_header",
		"std" => "Tons of Features",
		"type" => "text");
		
	$options[] = array( "name" => __("Third Column Text", "apprise"),
		"desc" => "Enter text to display in the body of the third column",
		"id" => "third_column_text",
		"std" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.",
		"type" => "textarea");
		
	$options[] = array( "name" => __("Third Column Image", "apprise"),
		"desc" => sprintf( __( 'Enter Font Awesome icon name. For icon name refer to: <a href="%1$s" target="_blank">Font Awesome Website</a>', 'apprise' ), 'http://fortawesome.github.io/Font-Awesome/icons/' ),
		"id" => "third_column_image",
		"std" => "fa-cog",
		"type" => "text");
		
	// Widgets Options
	$options[] = array(
		"name" => __("Widgets", "apprise"),
		"type" => "heading");
				
	$options[] = array(
		'name' => __('Archives Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Archives Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "archives_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Archives Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "archives_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Archives Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "archives_widget_title_color",
		"std" => "#000000",
		"type" => "color");	
		
	$options[] = array(
		'name' => __('Categories Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Categories Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "categories_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Categories Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "categories_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Categories Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "categories_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array(
		'name' => __('Calendar Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Calendar Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "calendar_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Calendar Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "calendar_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Calendar Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "calendar_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array(
		'name' => __('Custom Menu Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Custom Menu Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "custom_menu_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Custom Menu Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "custom_menu_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Custom Menu Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "custom_menu_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array(
		'name' => __('Links Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Links Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "links_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Links Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "links_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Links Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "links_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array(
		'name' => __('Meta Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Meta Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "meta_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Meta Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "meta_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Meta Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "meta_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array(
		'name' => __('Pages Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Pages Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "pages_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Pages Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "pages_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Pages Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "pages_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array(
		'name' => __('Recent Comments Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Recent Comments Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "recent_comments_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Recent Comments Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "recent_comments_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Recent Comments Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "recent_comments_widget_title_color",
		"std" => "#000000",
		"type" => "color");

	$options[] = array(
		'name' => __('Recent Posts Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Recent Posts Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "recent_posts_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Recent Posts Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "recent_posts_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Recent Posts Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "recent_posts_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array(
		'name' => __('RSS Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("RSS Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "rss_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("RSS Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "rss_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("RSS Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "rss_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array(
		'name' => __('Search Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Search Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "search_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Search Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "search_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Search Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "search_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array(
		'name' => __('Tag Cloud Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Tag Cloud Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "tag_cloud_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Tag Cloud Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #FFFFFF )",
		"id" => "tag_cloud_widget_font_color",
		"std" => "#FFFFFF",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Tag Cloud Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "tag_cloud_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array(
		'name' => __('Text Widget Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Text Widget Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "text_widget_bg_color",
		"std" => "#EAEAEA",
		"type" => "color");

	$options[] = array( "name" =>  __("Text Widget Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "text_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Text Widget Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "text_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array(
		'name' => __('Other Widgets Settings:', 'apprise'),
		'desc' => __('', 'apprise'),
		'type' => 'info');
		
	$options[] = array( "name" =>  __("Other Widgets Background Color","apprise"),
		"desc" => "Pick background color. ( Default: #EAEAEA )",
		"id" => "other_widget_bg_color",
		"std" => "#eaeaea",
		"type" => "color");

	$options[] = array( "name" =>  __("Other Widgets Font Color","apprise"),
		"desc" => "Pick font color. ( Default: #000000 )",
		"id" => "other_widget_font_color",
		"std" => "#000000",
		"type" => "color");
		
	$options[] = array( "name" =>  __("Other Widgets Title Color","apprise"),
		"desc" => "Pick title color. ( Default: #000000 )",
		"id" => "other_widget_title_color",
		"std" => "#000000",
		"type" => "color");
		
	// Social Links		
	$options[] = array(
		'name' => __('Social Links', 'apprise'),
		'type' => 'heading');

	$options[] = array( "name" => "Facebook",
		"desc" => "Enter your profile URL. To remove it, just leave it blank",
		"id" => "facebook_link",
		"std" => "#",
		"type" => "text"); 

	$options[] = array( "name" => "Flickr",
		"desc" => "Enter your profile URL. To remove it, just leave it blank",
		"id" => "flickr_link",
		"std" => "#",
		"type" => "text");

	$options[] = array( "name" => "RSS",
		"desc" => "Enter your profile URL. To remove it, just leave it blank",
		"id" => "rss_link",
		"std" => "#",
		"type" => "text"); 

	$options[] = array( "name" => "Twitter",
		"desc" => "Enter your profile URL. To remove it, just leave it blank",
		"id" => "twitter_link",
		"std" => "#",
		"type" => "text");

	$options[] = array( "name" => "Youtube",
		"desc" => "Enter your profile URL. To remove it, just leave it blank",
		"id" => "youtube_link",
		"std" => "#",
		"type" => "text");

	$options[] = array( "name" => "Pinterest",
		"desc" => "Enter your profile URL. To remove it, just leave it blank",
		"id" => "pinterest_link",
		"std" => "#",
		"type" => "text");

	$options[] = array( "name" => "Tumblr",
		"desc" => "Enter your profile URL. To remove it, just leave it blank",
		"id" => "tumblr_link",
		"std" => "#",
		"type" => "text");

	$options[] = array( "name" => "Google Plus",
		"desc" => "Enter your profile URL. To remove it, just leave it blank",
		"id" => "google_link",
		"std" => "#",
		"type" => "text");

	$options[] = array( "name" => "Dribbble",
		"desc" => "Enter your profile URL. To remove it, just leave it blank",
		"id" => "dribbble_link",
		"std" => "#",
		"type" => "text");

	$options[] = array( "name" => "LinkedIn",
		"desc" => "Enter your profile URL. To remove it, just leave it blank",
		"id" => "linkedin_link",
		"std" => "#",
		"type" => "text");
		
	$options[] = array( "name" => "Instagram",
		"desc" => "Enter your profile URL. To remove it, just leave it blank",
		"id" => "instagram_link",
		"std" => "#",
		"type" => "text");
		
	// Custom CSS		
	$options[] = array(
		'name' => __('Custom CSS', 'apprise'),
		'type' => 'heading');
		
	$options[] = array( "name" => __("Custom CSS Code","apprise"),
         "desc" => "",
         "id" => "custom_css",
         "std" => "",
         "type" => "textarea");

	// Portfolio		
	$options[] = array(
		'name' => __('Portfolio', 'apprise'),
		'type' => 'heading');	
		
	$options[] = array(
		'name' => "Portfolio Layout",
		'desc' => "",
		'id' => "portfolio_layout_settings",
		'std' => "col1",
		'type' => "images",
		'options' => array(
			'col1' => $imagepath . 'col-1c.png',
			'col2-l' => $imagepath . 'col-2cl.png',
			'col2-r' => $imagepath . 'col-2cr.png',
			'col3-l' => $imagepath . 'col-3cl.png',
			'col3-m' => $imagepath . 'col-3cm.png',
			'col3-r' => $imagepath . 'col-3cr.png')
	);
		
	$options[] = array( "name" => __("Number of Portfoilo Items","apprise"),
		"desc" => "Number of portfolio items to display",
		"id" => "portfolio_items",
		"std" => "8",
		"class" => "mini",
		"type" => "text");
		
	$options[] = array( "name" => __("Portfolio Layout","apprise"),
		"desc" => "Select portfolio layout",
		"id" => "portfolio_layout",
		"std" => "columns-3",
		"type" => "select",
		"options" => $portfolio_layout);
		
	$options[] = array("name" => __("prettyPhoto", "apprise"),
		"desc" => "Enable/Disable prettyPhoto script when clicking on portfolio images",
		"id" => "pretty_photo",
		"std" => "1",
		"type" => "checkbox");
		
	// Contact		
	$options[] = array(
		'name' => __('Contact', 'apprise'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => "Contact Page Layout",
		'desc' => "",
		'id' => "contact_layout_settings",
		'std' => "col1",
		'type' => "images",
		'options' => array(
			'col1' => $imagepath . 'col-1c.png',
			'col2-l' => $imagepath . 'col-2cl.png',
			'col2-r' => $imagepath . 'col-2cr.png',
			'col3-l' => $imagepath . 'col-3cl.png',
			'col3-m' => $imagepath . 'col-3cm.png',
			'col3-r' => $imagepath . 'col-3cr.png')
	);

	$options[] = array( "name" => __("Address","apprise"),
		"desc" => "Address to display on contact page",
		"id" => "contact_address",
		"std" => "Madison Square Garden <br> Pennsylvania Plaza, New York, NY",
		"type" => "textarea");
		
	$options[] = array( "name" => __("Phone Number","apprise"),
		"desc" => "Phone number display on contact page",
		"id" => "contact_phone",
		"std" => "888-123-4567<br>888-987-6543",
		"type" => "textarea");
		
	$options[] = array( "name" => __("Email ID","apprise"),
		"desc" => "Email ID's to display on contact page",
		"id" => "contact_email",
		"std" => '<a href="mailto:info@yourdomain.com">info@yourdomain.com</a><br><a href="mailto:contact@yourdomain.com">contact@yourdomain.com</a>',
		"type" => "textarea");
		
	$options[] = array( "name" => __("Google Map Address","apprise"),
		"desc" => "Example: Madison Square Garden, Pennsylvania Plaza, New York, NY. For multiple markers, simply separate the addresses with the |  symbol.",
		"id" => "gmap_address",
		"std" => "Madison Square Garden, Pennsylvania Plaza, New York, NY",
		"type" => "textarea");
		
	$options[] = array( "name" => __("Google Map Type","apprise"),
		"desc" => "Select the type of map to show on google map",
		"id" => "gmap_type",
		"std" => "roadmap",
		"options" => array('roadmap' => 'roadmap', 'satellite' => 'satellite', 'hybrid' => 'hybrid', 'terrain' => 'terrain'),
		"type" => "select");
		
	$options[] = array( "name" => __("Map Zoom Level","apprise"),
		"desc" => "Higher number will be more zoomed in",
		"id" => "map_zoom_level",
		"std" => "17",
		"class" => "mini",
		"type" 		=> "text");
		
	$options[] = array("name" => __("Map Scrollwheel","apprise"),
		"desc" => "Enable/Disable scrollwheel on google maps",
		"id" => "map_scrollwheel",
		"std"=> 0,
		"type" => "checkbox");
		
	$options[] = array("name" => __("Map Scale","apprise"),
		"desc" => "Enable/Disable scale on google maps",
		"id" => "map_scale",
		"std"=> 0,
		"type" => "checkbox");
		
	$options[] = array("name" => __("Map Zoom & Pan Control Icons","apprise"),
		"desc" => "Zoom control icon and pan control icon on google maps",
		"id" => "map_zoomcontrol",
		"std"=> 0,
		"type" => "checkbox");
				
			
	return $options;
}