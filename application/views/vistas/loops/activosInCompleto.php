<tr id="<?php echo $id;?>">
                        <td>
                         <div class="col-lg-6">
                            <div class="input-group">
                                <input type="checkbox" checked>
                                <!--<input type="hidden" name="country" value="<?php echo $id;?>">-->
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->

                        </td>
                        
                        <td><?php echo $nombreActivo; ?></td>
                        
                        <td>
                            <select class="form-control" disabled="true">
                                <div class="col-lg-6">
                                <option value="10"><?php echo $calCuantitativa;?></option>
                            </div>
                            </select>    
                        </td>

                        <td>
                            <div class="col-lg-9">
                            <div class="form-group">
                                 <div  class="radio" disabled="true">
                                <label>
                                        <input type="radio" name="optionsRadiosInline<?php echo $id;?>"  value="0" checked> <?php if($calCualitativa==0){ echo "Buen estado"; }else{echo "Mal estado";}  ?>
                                </label>
                                </div>
              
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->

                        </td>
                        <td>
                            <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" id="inpComentario" value="<?php echo $comentarioAA ?>" disabled="true">
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->
                        </td>
                    </tr>