<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="List elements from directory">

		<style>
			body {
				background: #eee;
			}
			
			table, h3 {
				font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
				border-collapse: collapse;
				margin-left: auto;
				margin-right: auto;
				width: 90%;
			}
			
			table td, table th {
				border: 1px solid #ddd;
				text-align: center;
				padding: 8px;
			}
			
			table tr:nth-child(even){background-color: #f2f2f2;}
			table tr:hover {background-color: #ddd;}
			
			table th {
				padding-top: 12px;
				padding-bottom: 12px;
				text-align: center;
				background-color: #333;
				color: white;
			}
			
			.alignLeft {
				text-align: left;
			}
			
			#floatRight {
				float: right;
			}
			
			a {
				color: #0000ee;
				text-decoration: none;
			}
		</style>
		
    </head>

    <body>
		<?php
		
			$path = getcwd();
			$files = scandir($path);
			$files = array_diff(scandir($path), array('.', '..'));
			$index = array_search('index.php', $files);
			
			if ($index !== false)
				unset( $files[$index] );
			
			print " <h3> Index of : /".basename(__DIR__)."<span id='floatRight'><a href='../'>Parent directory</a></span></h3>

					<table>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Type</th>
							<th>Size</th>
							<th>Last modified</th>
						</tr>";

			foreach ($files as $fileIndex => $file)  {

				$fileIndex--;
				
				print " <tr>
							<td>".$fileIndex."</td>
							<td class='alignLeft'><a href='".rawurlencode($file)."'>".preg_replace('/\\.[^.\\s]{3,4}$/', '', $file)."</a></td>
							<td>".pathinfo($file, PATHINFO_EXTENSION)."</td>
							<td>".number_format(filesize($file)/ 1048576, 2)." Mb</td>
							<td>".date ("d/m/Y H:i:s", filemtime($file))."</td>
						</tr>";
				}

			print " </table>";
		?>
    </body>
</html>