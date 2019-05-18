<div class="row">
	<div class="col-lg-5">
		<!--begin::Portlet-->
		<div class="m-portlet">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<span class="m-portlet__head-icon m--hide">
						<i class="la la-gear"></i>
						</span>
						<h3 class="m-portlet__head-text">
							SubCategory Creation
						</h3>
					</div>
					{{ this.flash.output() }}
				</div>
			</div>
			<form class="m-form m-form--fit m-form--label-align-right" method="POST">
                <div class="m-portlet__body">

                    <div class="form-group m-form__group">
                        <label for="categoryInput">SubCategory</label>
                        <input type="text" name="sub_category_name" class="form-control m-input m-input--air" id="categoryInput" aria-describedby="SubCategory Type" placeholder="Enter SubCategory Type">
                        <span class="m-form__help">We'll never share your email with anyone else.</span>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="exampleSelect1">Category</label>
                        <select class="form-control m-input" name="category_id" id="exampleSelect1">
                        {% for keyCat, valueCat in category %}
                            <option value="{{ valueCat.category_id }}">{{ valueCat.category_name | capitalize }}</option>
                        {% endfor %}
                        </select>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__foot--fit">
                    <div class="m-form__actions">
                        <button type="submit" class="btn btn-brand btn-lg">Submit</button>
                        <button type="reset" class="btn btn-secondary btn-lg">Cancel</button>
                    </div>
                </div>
            </form>
            <!--end::Form-->
		</div>
		<!--end::Portlet-->

	</div>

	<div class="col-lg-7">
	    <!--end: Datatable --><!--begin: Search Form -->
                    <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
                        <div class="row align-items-center">
                            <div class="col-xl-8 order-2 order-xl-1">
                                <div class="form-group m-form__group row align-items-center">
                                    <div class="col-md-4">
                                        <div class="m-input-icon m-input-icon--left">
                                            <input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
                                            <span class="m-input-icon__icon m-input-icon__icon--left">
                                                <span><i class="la la-search"></i></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                                <a href="{{ url('admin/products') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                                    <span>
                                        <i class="la la-plus"></i>
                                        <span>Add New Product</span>
                                    </span>
                                </a>
                                <div class="m-separator m-separator--dashed d-xl-none"></div>
                            </div>
                        </div>
                    </div>
                    <!--end: Search Form -->

                    <!--begin: Datatable -->
                    <table class="m-datatable" id="html_table" width="100%">
                        <thead>
                        <tr>
                            <th title="Field #1">ID</th>
                            <th title="Field #2">Category Name</th>
                            <th title="Field #2">Subcategory Name</th>
                            <th title="Field #3">Action(s)</th>
                        </tr>
                        </thead>
                        <tbody>
                        {% for keys,values in subcategory %}
                        <tr>
                            <td>{{ values.sub_category_id }}</td>
                            <td>{{ values.getCategory().category_name | capitalize }}</td>
                            <td>{{ values.sub_category_name | capitalize }}</td>
                            <td>
                                <div class="btn-group">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="m-btn btn btn-secondary"><i class="la la-edit"></i></button>

                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Manage
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item" href="#">Dropdown link</a>
                                                <a class="dropdown-item" href="#">Dropdown link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        {% endfor %}

                    </tbody>
                </table>
           <!--end: Datatable -->
	</div>

</div>