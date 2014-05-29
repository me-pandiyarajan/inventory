<div class="col-sm-9 col-md-10 main">

<h1 class="page-header">VIEW PRODUCT</h1>

 <!-- dynamic view content --> 
<div class="table-responsive">
<table class="table table-bordered">
                 <thead>
				 </thead>			
				<tbody role="alert" aria-live="polite" aria-relevant="all">
				<tr class="odd"> 
					<th width="25%"> Product Name </th>
					<td><?php echo $product->getProductName(); ?></td>
				</tr>

                <tr class="odd"> 
					<th> Status </th>
					<td><?php $status = $product->getStatus(); 
					if($status == 0)
						echo $stat = "DISABLED";
					else
						echo $stat = "ENABLED";
				?></td>
				</tr>
                <tr class="odd"> 
					<th> County of Manufacture</th>
					<td><?php echo $product->getCountryOfManufacture(); ?></td>
				</tr>
                <tr class="odd"> 
					<th> Product Description</th>
					<td><?php echo $product->getDescription(); ?></td>
				</tr>
                <tr class="odd"> 
					<th> Product Short Description</th>
					<td><?php echo $product->getShortDescription(); ?></td>
				</tr>
				<?php 
				if($visiblity == 1)
				{
                echo'<tr class="odd"> 
						<th> Quantity</th>
						<td>'.$product->getQuantity()." ".$product->getUnit().'</td>
					</tr>
                <tr class="odd"> 
					<th> Price</th>
					<td>'.$product->getPrice().'</td>
				</tr>
				
				<tr class="odd"> 
				<th> Installation Charges</th>
				<td>'.$product->getInstallationCharges().'</td>
				</tr>
				
				
				<tr class="odd"> 
				<th> Stock Availability</th>
				<td>';
				$StockAvailability = $product->getStockAvailability(); 
					if($StockAvailability == 0)
						echo $stock = "OUT-OF-STOCK";
					else
						echo $stock = "IN-STOCK";	
				'</td>
				</tr>
				<tr class="odd"> 
					<th> Safety Stock Level</th>
					<td>'.$product->getSafetyStockLevel().'</td>
				</tr>
				<tr class="odd"> 
					<th> POS Stock Level</th>
					<td>'.$product->getPosStockLevel().'</td>
				</tr>
				
				';
                }
				?>
				<tr class="odd"> 
					<th>Product Image</th>
					<td><img src="<?php echo $product->getUploadImage();?>" class="img-thumbnail"></td>
				</tr>
				<tr class="odd"> 
					<th>Weight</th>
					<td><?php 
							$weight = $product->getWeight();
							if($weight > 0)
								echo $weight." ".$product->getDimenUnit();
							else
								echo $weight;
							?>
					</td>
				</tr>
				<tr class="odd"> 
					<th>Width</th>
					<td><?php 
							$width = $product->getWidth();
							if($width > 0)
								echo $width." ".$product->getDimenUnit();
							else
								echo $width;
							?>
					</td>
				</tr>
				<tr class="odd"> 
					<th>Length</th>
					<td><?php 
							$length = $product->getLength();
							if($length > 0)
								echo $length." ".$product->getLength();
							else
								echo $length;
							?>
					</td>
				</tr>
				<tr class="odd"> 
					<th>Height</th>
					<td><?php 
							$height = $product->getHeight();
							if($height > 0)
								echo $height." ".$product->getDimenUnit();
							else
								echo $height;
							?>
					</td>
				</tr>
				<tr class="odd"> 
					<th>Design Name</th>
					<td><?php echo $product->getDesignName();?></td>
				</tr>
				<tr class="odd"> 
					<th>Shade</th>
					<td><?php echo $product->getShade();?></td>
				</tr>
				</tbody>
									
				</table>

				 <a class="btn btn-primary btn-xs" href="<?php echo base_url(); ?>product/productDetails/<?php echo $product->getproductGenId(); ?>/productedit">Edit</a>
				 <a type="button" href="<?php echo base_url();?>product/productlist" class="btn btn-default btn-xs">Done</a>

			</div>

<!-- dynamic view content end-->

</div>
