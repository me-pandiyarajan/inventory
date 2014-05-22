$(document).ready(function() {
    
    /*
    *  Login form
    */

    $('#login-form').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            identity: {
                validators: {
                    notEmpty: {
                        message: 'The Email Address is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid Email Address'
                    }
                }
            },
            password: {
                message: 'The Password is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 5,
                        max: 15,
                        message: 'The Password must be more than 5 and less than 15 characters long'
                    }
                }
            }
        },
        submitHandler: function(validator, form, submitButton) {
                validator.defaultSubmit();
            }
    });


    /*
    *  deo add product 
    */

    $('#deo-add-product').bootstrapValidator({
        message: 'Please enter the appropriate value',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        live: 'enabled',
        fields: {
            productName: {
                validators: {
                     notEmpty: {
                        message: 'Please enter Product Name'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The product name can only consist of alphabetical, number and underscore'
                    }
                }
            },
            category_id: {
                validators: {
                    callback: {
                        message: 'Please choose Product Category',
                        callback: function(value, validator) {
                            var options = validator.getFieldElements('category_id').val();
                            return (options && options >= 1);
                        }
                    }
                }
            },
            supplier_id: {
                validators: {
                    callback: {
                        message: 'Please choose the Supplier of the product',
                        callback: function(value, validator) {
                            var options = validator.getFieldElements('supplier_id').val();
                            return (options && options >= 1);
                        }
                    }
                }
            },
            dimunit: {
                validators: {
                    callback: {
                        message: 'Please choose the Dimention unit for the given dimension(s)',
                        callback: function(value, validator) {
                            var options = validator.getFieldElements('dimunit').val();
                            var weight = validator.getFieldElements('weight').val();
                            var width = validator.getFieldElements('width').val();
                            var length = validator.getFieldElements('length').val();
                            var height = validator.getFieldElements('height').val();
                            if(weight.length > 0 || width.length > 0 || length.length > 0 || height.length > 0) {
                                if( options.length >= 1){
                                     return true;
                                }else{
                                     return false;
                                }                         
                            }
                            else {
                                return true;
                            }
                            
                        }
                    }
                }
            },
            weight: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Weight can only consist of number'
                    }
                }
            },
             width: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Width can only consist of number'
                    }
                }
            },
             length: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Length can only consist of number'
                    }
                }
            },
             height: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Height can only consist of number'
                    }
                }
            },
            design_name: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The Design can only consist of alphabetical, number and underscore'
                    }
                }
            },
            shade: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The Shade can only consist of alphabetical, number and underscore'
                    }
                }
            }

        }
        
    });

     /*
    *  admin add product 
    */

    $('#admin-add-product').bootstrapValidator({
        message: 'Please enter the appropriate value',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            productName: {
                validators: {
                     notEmpty: {
                        message: 'Please enter Product Name'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The product name can only consist of alphabetical, number and underscore'
                    }
                }
            },
            category_id: {
                validators: {
                    callback: {
                        message: 'Please choose Product Category',
                        callback: function(value, validator) {
                            var options = validator.getFieldElements('category_id').val();
                            return (options && options >= 1);
                        }
                    }
                }
            },
            supplier_id: {
                validators: {
                    callback: {
                        message: 'Please choose the Supplier of the product',
                        callback: function(value, validator) {
                            var options = validator.getFieldElements('supplier_id').val();
                            return (options && options >= 1);
                        }
                    }
                }
            },
            quantity: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Quantity can only consist of number'
                    }
                }
            },
            unit: {
                validators: {
                    notEmpty: {
                        message: 'Please choose Quantity Unit'
                    }
                }
            },
            dimunit: {
                validators: {
                    callback: {
                        message: 'Please choose the Dimention unit for the given dimension(s)',
                        callback: function(value, validator) {
                            var options = validator.getFieldElements('dimunit').val();
                            var weight = validator.getFieldElements('weight').val();
                            var width = validator.getFieldElements('width').val();
                            var length = validator.getFieldElements('length').val();
                            var height = validator.getFieldElements('height').val();

                            if(weight.length > 0 || width.length > 0 || length.length > 0 || height.length > 0) {
                                 if( options.length >= 1){
                                     return false;
                                }else{
                                     return true;
                                }
                            }
                            else {
                                return true;
                            }
                            
                        }
                    }
                }
            },
            weight: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Weight can only consist of number'
                    }
                }
            },
             width: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Width can only consist of number'
                    }
                }
            },
             length: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Length can only consist of number'
                    }
                }
            },
             height: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Height can only consist of number'
                    }
                }
            },
            design_name: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The Design can only consist of alphabetical, number and underscore'
                    }
                }
            },
            shade: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The Shade can only consist of alphabetical, number and underscore'
                    }
                }
            }

        }
        
    });


     /*
    *  super admin add product 
    */

    $('#superadmin-add-product').bootstrapValidator({
        message: 'Please enter the appropriate value',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            productName: {
                validators: {
                     notEmpty: {
                        message: 'Please enter Product Name'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The product name can only consist of alphabetical, number and underscore'
                    }
                }
            },
            category_id: {
                validators: {
                    callback: {
                        message: 'Please choose Product Category',
                        callback: function(value, validator) {
                            var options = validator.getFieldElements('category_id').val();
                            return (options && options >= 1);
                        }
                    }
                }
            },
            supplier_id: {
                validators: {
                    callback: {
                        message: 'Please choose the Supplier of the Product',
                        callback: function(value, validator) {
                            var options = validator.getFieldElements('supplier_id').val();
                            return (options && options >= 1);
                        }
                    }
                }
            },
            status: {
                validators: {
                    notEmpty: {
                        message: 'Please choose the Status of product'
                    }
                }
            },
            price: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Unit Price can only consist of number'
                    }
                }
            },
            installation_charges: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Installation Charges can only consist of number'
                    }
                }
            },
            quantity: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Quantity can only consist of number'
                    }
                }
            },
            stock_availability: {
                validators: {
                    notEmpty: {
                        message: 'Please choose the Stock Availability of the product'
                    }
                }
            },
            safety_stock_level: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Safety Stock Level can only consist of number'
                    }
                }
            },
            POS_stock_level: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The POS Stock Level can only consist of number'
                    }
                }
            },
            unit: {
                validators: {
                    notEmpty: {
                        message: 'Please choose Quantity unit'
                    }
                }
            },
            dimunit: {
                validators: {
                    callback: {
                        message: 'Please choose the dimention unit for the given dimension(s)',
                        callback: function(value, validator) {
                            var options = validator.getFieldElements('dimunit').val();
                            var weight = validator.getFieldElements('weight').val();
                            var width = validator.getFieldElements('width').val();
                            var length = validator.getFieldElements('length').val();
                            var height = validator.getFieldElements('height').val();

                            if(weight.length > 0 || width.length > 0 || length.length > 0 || height.length > 0) {
                                 if( options.length >= 1){
                                     return false;
                                }else{
                                     return true;
                                }
                            }
                            else {
                                return true;
                            }
                            
                        }
                    }
                }
            },
            weight: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Weight can only consist of number'
                    }
                }
            },
             width: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Width can only consist of number'
                    }
                }
            },
             length: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Length can only consist of number'
                    }
                }
            },
             height: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Height can only consist of number'
                    }
                }
            },
            design_name: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The Design can only consist of alphabetical, number and underscore'
                    }
                }
            },
            shade: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The Shade can only consist of alphabetical, number and underscore'
                    }
                }
            }

        }
        
    });

   $('#quantity').blur(function() {
        $("#POS_stock_level").val(this.value);       
    });


 /*
    *  Add Category
    */

    $('#add-category').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            productcategory: {
                validators: {
                    notEmpty: {
                        message: 'The Category Name is required and cannot be empty'
                    }
                }
            },
            comments: {
                validators: {
                    notEmpty: {
                        message: 'The Comments is required and cannot be empty'
                    }
                }
            }
        }
        
    });
/*
    * Add Supplier
    */

     $('#add-supplier').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            supplier_name: {
                validators: {
                    notEmpty: {
                        message: 'The Supplier Name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {           
                    notEmpty: {
                        message: 'The Email Address is required and cannot be empty'
                        },
                     emailAddress: {
                        message: 'The input is not a valid Email Address'
                    }
                }
            },
            mobile: {
                    validators: {
                        notEmpty: {
                            message: 'The Mobile Number is required'
                        },
                        phone: {
                            message: 'The Mobile Number is not valid'
                        }
                    }
                },
             street: {
                    validators: {
                        notEmpty: {
                            message: 'The Address is required and cannot be empty'
                        }
                    }
                },
            city: {
                    validators: {
                        notEmpty: {
                            message: 'The City is required and cannot be empty'
                        }
                    }
                },
                state: {
                    validators: {
                        notEmpty: {
                            message: 'The State is required and cannot be empty'
                        }
                    }
                },
                
                zip: {
                    validators: {
                        notEmpty: {
                            message: 'The Zip Code is required and cannot be empty'
                        },
                        zipCode: {
                            message: 'The Zip Code is not valid'
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'Please choose the Status '
                        }
                    }
                }
            
        }
        
        
        
        
    });
    
    /*
    * Edit Supplier
    */

     $('#edit-supplier').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            supplier_name: {
                validators: {
                    notEmpty: {
                        message: 'The Supplier Name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {           
                    notEmpty: {
                        message: 'The Email Address is required and cannot be empty'
                     },
                      emailAddress: {
                        message: 'The input is not a valid Email Address'
                    }
                     
                }
            },
            mobile: {
                    validators: {
                        notEmpty: {
                            message: 'The Mobile Number is required'
                        },
                        phone: {
                            message: 'The Mobile Number is not valid'
                        }
                    }
                },
             street: {
                    validators: {
                        notEmpty: {
                            message: 'The Address is required and cannot be empty'
                        }
                    }
                },
            city: {
                    validators: {
                        notEmpty: {
                            message: 'The City is required and cannot be empty'
                        }
                    }
                },
                state: {
                    validators: {
                        notEmpty: {
                            message: 'The State is required and cannot be empty'
                        }
                    }
                },
                
                zip: {
                    validators: {
                        notEmpty: {
                            message: 'The Zip Code is required and cannot be empty'
                        },
                        zipCode: {
                            message: 'The Zip Code is not valid'
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'Please choose the Status'
                        }
                    }
                }
            
        }
     });

    /*
    * new estimate
    */

     $('#new-estimate').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            estimate_name: {
                validators: {
                    notEmpty: {
                        message: 'The Estimate Name is required and cannot be empty'
                    }
                }
            },
            supplier_name: {
                validators: {
                    notEmpty: {
                        message: 'The Supplier Name is required and cannot be empty'
                    }
                }
            },
             phone: {
                    validators: {
                        notEmpty: {
                            message: 'The Mobile Number is required'
                        },
                        phone: {
                            message: 'The Mobile Number is not valid'
                        }
                    }
                },
            
            email: {
                validators: {           
                    notEmpty: {
                        message: 'The Email Address is required and cannot be empty'
                     },
                      emailAddress: {
                        message: 'The input is not a valid Email Address'
                    }
                }
            },
            address: {
                    validators: {
                        notEmpty: {
                            message: 'The Address is required and cannot be empty'
                        }
                    }
                }
            
        }
        
    });
/*
    * edit estimate
    */

     $('#edit-estimate').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            estimate_name: {
                validators: {
                    notEmpty: {
                        message: 'The Estimate Name is required and cannot be empty'
                    }
                }
            },
            supplier_name: {
                validators: {
                    notEmpty: {
                        message: 'The Supplier Name is required and cannot be empty'
                    }
                }
            },
             phone: {
                    validators: {
                        notEmpty: {
                            message: 'The Mobile Number is required'
                        },
                       phone: {
                            message: 'The Mobile Number is not valid'
                        }
                    }
                },
            email: {
                validators: {           
                    notEmpty: {
                        message: 'The Email Address is required and cannot be empty'
                      },
                       emailAddress: {
                        message: 'The input is not a valid Email Address'
                    }
                }
            },
            address: {
                    validators: {
                        notEmpty: {
                            message: 'The Address is required and cannot be empty'
                        }
                    }
                }
            }
        
    });
 /*
    *  order confirmation
    */

    $('#order-confirmation').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            product: {
                validators: {
                    notEmpty: {
                        message: 'The Product Name is required and cannot be empty'
                    }
                }
            },
            status: {
                validators: {
                    notEmpty: {
                        message: 'Please choose the Delivery Status'
                    }
                }
            },

             deliveredquantity: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Delivered Quantity can only consist of number'
                    }
                }
            },
            damagedquantity: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The Damaged Quantity can only consist of number'
                    }
                }
            }
           
        }
        
    });
    /*
    *  new estimate order
    */

    $('#new-estimate-order').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            order_name: {
                validators: {
                    notEmpty: {
                        message: 'The Order Name is required and cannot be empty'
                    }
                }
            },
            SupplierName: {
                validators: {
                    notEmpty: {
                        message: 'The Supplier Name is required and cannot be empty'
                    }
                }
            },
            supplieremail: {
                validators: {
                    notEmpty: {
                        message: 'The Email Address is required and cannot be empty'
                    },
                     emailAddress: {
                        message: 'The input is not a valid Email Address'
                    }
                }
            },
            address: {
                    validators: {
                        notEmpty: {
                            message: 'The Address is required and cannot be empty'
                        }
                    }
                },  
                supplierTelephone: {
                    validators: {
                        notEmpty: {
                            message: 'The Mobile Number is required'
                        },
                       phone: {
                            message: 'The Mobile Numberr is not valid'
                        }
                    }
                },
            estimatedate: {
                    validators: {
                        notEmpty: {
                            message: 'The Estimate Date is required and cannot be empty'
                        }
                     }
                }
            
        }
        
    });
        /*
    *  add user
    */

    $('#add-user').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
                first_name: {
                validators: {
                    notEmpty: {
                        message: 'The First Name is required and cannot be empty'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'The Last Name is required and cannot be empty'
                    }
                }
            },
            
            email: {
                validators: {
                    notEmpty: {
                        message: 'The Email Address is required and cannot be empty'
                    },
                     emailAddress: {
                        message: 'The input is not a valid Email Address'
                    }
                }
            },
             mobile: {
                    validators: {
                        notEmpty: {
                            message: 'The Mobile Number is required'
                        },
                        phone: {
                            message: 'The Mobile Number is not valid'
                        }
                    }
                },
            
            group: {
                    validators: {
                        notEmpty: {
                            message: 'The Group is required and cannot be empty'
                        }
                     }
                },
            status: {
                    validators: {
                        notEmpty: {
                            message: 'Please choose the Status'
                        }
                     }
                }
        }
        
    });
            /*
    *  edit user
    */

    $('#edit-user').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The First Name is required and cannot be empty'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'The Last Name is required and cannot be empty'
                    }
                }
            },
            
            email: {
                validators: {
                    notEmpty: {
                        message: 'The Email Address is required and cannot be empty'
                    },
                     emailAddress: {
                        message: 'The input is not a valid Email Address'
                    }
                }
            },
             phone: {
                    validators: {
                        notEmpty: {
                            message: 'The Mobile Number is required'
                        },
                        phone: {
                            message: 'The Mobile Number is not valid'
                        }
                    }
                },
            group: {
                    validators: {
                        notEmpty: {
                            message: 'The Group is required and cannot be empty'
                        }
                     }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'Please choose the Status'
                        }
                     }
                }
            
        }
        
    });

    /*
    * edit profile
    */

    $('#edit-profile').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                    notEmpty: {
                        message: 'The First Name is required and cannot be empty'
                    }
                }
            },
            last_name: {
                validators: {
                    notEmpty: {
                        message: 'The Last Name is required and cannot be empty'
                    }
                }
            },
            
            email: {
                validators: {
                    notEmpty: {
                        message: 'The Email Address is required and cannot be empty'
                    },
                     emailAddress: {
                        message: 'The input is not a valid Email Address'
                    }
                }
            },
           
           password: {
                message: 'The Password is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 5,
                        max: 15,
                        message: 'The Password must be more than 5 and less than 15 characters long'
                    }
                }
            },
           password_confirm: {
                message: 'The Confirm Password is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Confirm Password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 5,
                        max: 15,
                        message: 'The Confirm Password must be more than 5 and less than 15 characters long'
                    }
                }
            }
        
              
            
        }
        
    });


});