<div class="row">
	<div class="col-lg-12">
		<!--begin::Portlet-->
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							Horizontal Form Sections
						</h3>
					</div>
					{{ this.flash.output() }}
				</div>
			</div>
			<!--begin::Form-->
			<form class="m-form m-form--label-align-right" method="POST" enctype="multipart/form-data">
				<div class="m-portlet__body">	
					<div class="m-form__section m-form__section--first">		
						<div class="m-form__heading">
							<h3 class="m-form__heading-title">Products Info:</h3>
						</div>
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">Title:</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" name="title" placeholder="Enter Product Title">
								<span class="m-form__help">Please enter the full title</span>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">Description:</label>
							<div class="col-lg-6">
								<input type="text" class="form-control m-input" placeholder="Enter Description" name="description">
								<span class="m-form__help">Enter Category of the Product</span>
							</div>
						</div>						
						<div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-2">Category</label>
                            <div class="col-lg-6">
                                <select class="form-control m-select2" id="m_select2_1" name="category">
                                    {% for keys, values in category %}
                                        <option value="{{values.category_id}}">{{ values.category_name }}</option>
                                    {% endfor %}
                                </select>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-form-label col-lg-2">Sub Category</label>
                            <div class="col-lg-6">
                                <select class="form-control m-select2" id="m_select2_2" name="sub_category">
                                    {% for keys,values in subcategory %}
                                        <option value="{{ values.sub_category_id }}">{{ values.sub_category_name }}</option>
                                    {% endfor %}
                                </select>
                            </div>
                        </div>
		            </div>

		            <div class="m-form__seperator m-form__seperator--dashed"></div>

		            <div class="m-form__section m-form__section--last">
		            	<div class="m-form__heading">
							<h3 class="m-form__heading-title">Payment Info:</h3>
						</div>
						<div class="m-form__group form-group row">
							<label class="col-lg-2 col-form-label">Payment Method:</label>
							<div class="col-lg-6">
								<div class="m-radio-list">
									<label class="m-radio">
			                           	<input type="radio" name="payment_methid_1"> Credit Card 
			                            <span></span>
			                        </label>
			                        <label class="m-radio">
			                           	<input type="radio" name="payment_methid_1"> Bitcoin
			                            <span></span>
			                        </label>
			                        <label class="m-radio">
			                           	<input type="radio" name="payment_methid_1"> Cash
			                            <span></span>
			                        </label>
			                    </div>
			                    <span class="m-form__help">Please select payment method</span>
		                    </div>
		                </div>
						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">Brand Name:</label>
							<div class="col-lg-6">
								<input type="text" name="brand" class="form-control m-input" placeholder="Brand Name | Title">
								<span class="m-form__help">Enter Brand Name | Title</span>
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">Current Stock:</label>
							<div class="col-lg-6">
								<input type="text" name="current_stock" class="form-control m-input" placeholder="Type in the Current Stock">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">Discount:</label>
							<div class="col-lg-6">
								<input type="text" name="discount" value="0" class="form-control m-input" placeholder="Discount Amount">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">Shipping Cost:</label>
							<div class="col-lg-6">
								<input type="text" name="shipping_cost" class="form-control m-input" placeholder="Shipping Cost Amount">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">Sales Price:</label>
							<div class="col-lg-6">
								<input type="text" name="sale_price" class="form-control m-input" placeholder="Enter Sales Price">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">Purchase Price:</label>
							<div class="col-lg-6">
								<input type="text" name="purchase_price" class="form-control m-input" placeholder="Enter Purchase Price">
							</div>
						</div>

						<div class="form-group m-form__group row">
							<label class="col-lg-2 col-form-label">File:</label>
							<div class="col-lg-6">
								<input type="file" name="front_image" class="form-control m-input" />
							</div>
						</div>
					</div>
	            </div>
	            <div class="m-portlet__foot m-portlet__foot--fit">
					<div class="m-form__actions m-form__actions">
						<div class="row">
							<div class="col-lg-2"></div>
							<div class="col-lg-6">
								<button type="submit" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-secondary">Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			<!--end::Form-->
		</div>
		<!--end::Portlet-->

	</div>
</div>