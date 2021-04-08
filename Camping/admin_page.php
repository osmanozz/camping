
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />
<link href="styleReserveringen.css" rel="stylesheet" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
			<h1><a href="#">Camping Village</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="index.html" accesskey="1" title="">Homepage</a></li>
				<li><a href="reserveringen.php" accesskey="2" title="">Reserveren</a></li>
				<li><a href="activiteiten.html" accesskey="3" title="">Faciliteiten</a></li>
				<li class="current_page_item"><a href="#" accesskey="4" title="">Admin</a></li>
                <br>
                <li><strong class="ingelogd">Ingelogd Als Admin</strong></li>
                <li><a href="logout.php" accesskey="4" title="">UITLOGGEN</a></li>
               
               
            
                
			</ul>
		</div>
	</div>
	<div id="header-featured">
		<div id="banner-wrapper">

	</div>
</div>
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">	
			
        <style>
            .ingelogd {
                color: red;
                font-size: 30px;
            }
            .edit {
                background-color: #4CAF50; 
                border: none;
                color: white;
                padding: 10px 27px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 13px;
                margin: 4px 2px;
                cursor: pointer;
            }
            .delete {
                background-color: #f44336; 
                border: none;
                color: white;
                padding: 10px 27px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 13px;
                cursor: pointer;
            }
           
    
    
            
        </style>
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    <?php  
        include 'database.php';
        $db = new database();

        $reserveringen = $db->select("SELECT * FROM ingeschereven", []);

        $columns = array_keys($reserveringen[0]);
        $row_data = array_values($reserveringen);

        if ($columns == 0 ) {
            echo "ERROR geen reservering";
        }

    ?>
     <th>
                <a href="reservering_toevoegen.php"><button>Reservering Toevoegen</button></a>
                <a class="voeg" href="medewerker_toevoegen.php"><button>Medewerker Toevoegen</button></a>
                </th>
     <table>
          
          <tr>
              <?php
                  foreach($columns as $column){
                      echo "<td><strong>$column</strong></td>";
                  }
              ?>
              </tr>
                
          <?php
              foreach($row_data as $rows){
                  $resno = $rows['resNo'];
                  echo "<tr>";
                  foreach($rows as $data){
                      echo "<td>$data</td>";
                  }
                  echo "<td>";
                  echo "<a class='edit' href=edit_reservering.php?id=$resno> Edit</a>";
                  echo "<a class='delete' href=delete_reservering.php?id=$resno> Delete</a>";

                  echo "</td>";
                  echo "<tr>";
            
              }
     ?>
     
      </table>

