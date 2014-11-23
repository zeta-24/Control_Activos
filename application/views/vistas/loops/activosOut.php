<tr disabled="true" id="disabled">
                        <td >
                         <div class="col-lg-6">
                            <div class="input-group">

                                <input type="checkbox" disabled="true">

                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->

                        </td>
                        
                        <td><?php echo $nombreActivo; ?></td>
                        
                        <td>
                            <select class="form-control" disabled="true">
                                <div class="col-lg-6">
                                <option value="10">10</option>
                                <option value="9">9</option>
                                <option value="8">8</option>
                                <option value="7">7</option>
                                <option value="6">6</option>
                                <option value="5">5</option>
                                <option value="4">4</option>
                                <option value="3">3</option>
                                <option value="2">2</option>
                                <option value="1">1</option>
                            </div>
                            </select>    
                        </td>

                        <td>
                            <div class="col-lg-9">
                              <div class="form-group">
                                <div  class="radio">
                                    <label>
                                        <input type="radio" name="optionsRadiosInline<?php echo $id;?>"  value="0" checked disabled="true">Buen estado
                                    </label>
                                </div>
                                
                                <div  class="radio">
                                     <label >
                                            <input type="radio" name="optionsRadiosInline<?php echo $id;?>"  value="1" disabled="true">Mal estado
                                    </label>
                                </div>
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->

                        </td>
                        <td>
                            <div class="col-lg-6">
                            <div class="input-group">
                                <input type="text" id="inpComentario" disabled="true">
                            </div><!-- /input-group -->
                          </div><!-- /.col-lg-6 -->
                        </td>
                    </tr>