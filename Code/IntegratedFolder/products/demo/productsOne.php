<?php
            $productId="";
            $productName="";
            $productPrise="";
            $productImg="";
            $datas[]='';
            $host = "localhost";
            $user = "rick";
            $pass = "";
            $database = "Noza";
			// Step #1: Open a connection to MySQL...
			// Docker users need to use the service name (ex: mysql)
			$conn = mysqli_connect($host, $user, $pass, $database);
			// And test the connection
			if (!$conn) {
				die("There was an error connecting to the database. Error: " . mysqli_connect_errno());
			}
			// Step #2: Selecting the database (assuming it has already been created)
			if (mysqli_select_db($conn, $database)) {
				// Step #3: Create the query
                /*
				$query = "SELECT product.Id,								 
								   product.productName AS productName,
								   product.unitPrice AS price,
								   product.imgInfo AS Imglink,
							FROM product;";
                            */
                            $query = "SELECT `Id`, `productName` as `zero`, `unitPrice` as `one`, `imgInfo` as `two` FROM `product`;";
				// Step #4: Prepare query as a statement
				if ($statement = mysqli_prepare($conn, $query)) {
					//Step #5: Execute statement and check success
					if (mysqli_stmt_execute($statement)) {
						echo "Query executed";
					} else {
						echo "Error executing query";
						die(mysqli_error($conn));
					}
                    mysqli_stmt_bind_result($statement, $productId, $productName, $productPrise, $productImg);
					// Step #6: Buffer the result if and only if you want to check the number of rows
					mysqli_stmt_store_result($statement);
					// Step #7: Check if there are results in the statement
					if (mysqli_stmt_num_rows($statement) > 0) {
						// Step #8: Fetch all rows of data from the result statement
					while (mysqli_stmt_fetch($statement)) {
						//$datas[] = [$productId => [$productName, $productPrise, $productImg]];
                        
                       
                        
					}
                    
                    print_r($datas);
						
					} else {
						echo "No datas found";
					}
					// Step #9: Close the statement and free memory
					mysqli_stmt_close($statement);
				} else {
					die(mysqli_error($conn));
				}
			}
			else {
				die(mysqli_error($conn));
			}
		
			// Step #10: Close the connection!
			mysqli_close($conn);


?>

