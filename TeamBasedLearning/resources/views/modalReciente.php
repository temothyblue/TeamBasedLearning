<div class="modal fade" id="modalReciente" tabindex="-1" role="dialog">
					  	<div class="modal-dialog modal-lg">
					    	<div class="modal-content">
					    		<div id="_status"></div> <!-- muestra error -->
						      	<div class="modal-header">
						      		<h4 class="modal-title">Actividad Reciente</h4>
						        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						      	</div>
						      	<div class="modal-body">
						      		<?php
										echo "		  	<br>
														<div class='container rounded border-5 head-reciente'>";
										for($i=0;$i<count($row);$i++){
											echo "		  <div class='row'>
															<div class='col-sm-3 link-reciente'>";
											echo $row[$i][1];
											echo "		    </div>
															<div class='col-sm-5 link-reciente'>";
											echo $row[$i][2];
											echo "			</div>
															<div class='col-sm-2'>";
											echo $row[$i][3];
											echo "			</div>
														  </div>";
										}
										echo "			</div>
														<br>";
									?>
					      		</div>
					      		<div class="modal-footer">
					        		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      		</div>
					    	</div>
					    </div>
					</div>