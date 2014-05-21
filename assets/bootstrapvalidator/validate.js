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
                        message: 'The username is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                message: 'The password is not valid',
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    stringLength: {
                        min: 5,
                        max: 15,
                        message: 'The password must be more than 5 and less than 15 characters long'
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
                        message: 'Please enter product name'
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
                        message: 'Please choose product category',
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
                        message: 'Please choose the supplier of the product',
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
                        message: 'Please choose the dimention unit for the given dimension(s)',
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
                        message: 'The weight can only consist of number'
                    }
                }
            },
             width: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The width can only consist of number'
                    }
                }
            },
             length: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The length can only consist of number'
                    }
                }
            },
             height: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The height can only consist of number'
                    }
                }
            },
            design_name: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The design can only consist of alphabetical, number and underscore'
                    }
                }
            },
            shade: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The shade can only consist of alphabetical, number and underscore'
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
                        message: 'Please enter product name'
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
                        message: 'Please choose product category',
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
                        message: 'Please choose the supplier of the product',
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
                        message: 'The quantity can only consist of number'
                    }
                }
            },
            unit: {
                validators: {
                    notEmpty: {
                        message: 'Please choose quantity unit'
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
                        message: 'The weight can only consist of number'
                    }
                }
            },
             width: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The width can only consist of number'
                    }
                }
            },
             length: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The length can only consist of number'
                    }
                }
            },
             height: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The height can only consist of number'
                    }
                }
            },
            design_name: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The design can only consist of alphabetical, number and underscore'
                    }
                }
            },
            shade: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The shade can only consist of alphabetical, number and underscore'
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
                        message: 'Please enter product name'
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
                        message: 'Please choose product category',
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
                        message: 'Please choose the supplier of the product',
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
                        message: 'Please choose the status of product'
                    }
                }
            },
            price: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The unit price can only consist of number'
                    }
                }
            },
            installation_charges: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The installation_charges can only consist of number'
                    }
                }
            },
            quantity: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The quantity can only consist of number'
                    }
                }
            },
            stock_availability: {
                validators: {
                    notEmpty: {
                        message: 'Please choose the stock_availability of the product'
                    }
                }
            },
            safety_stock_level: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The safety stock level can only consist of number'
                    }
                }
            },
            POS_stock_level: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The POS stock level can only consist of number'
                    }
                }
            },
            unit: {
                validators: {
                    notEmpty: {
                        message: 'Please choose quantity unit'
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
                        message: 'The weight can only consist of number'
                    }
                }
            },
             width: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The width can only consist of number'
                    }
                }
            },
             length: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The length can only consist of number'
                    }
                }
            },
             height: {
                validators: {
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'The height can only consist of number'
                    }
                }
            },
            design_name: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The design can only consist of alphabetical, number and underscore'
                    }
                }
            },
            shade: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9\s_]+$/,
                        message: 'The shade can only consist of alphabetical, number and underscore'
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
                        message: 'The category name is required and cannot be empty'
                    }
                }
            },
            comments: {
                validators: {
                    notEmpty: {
                        message: 'The comments is required and cannot be empty'
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
                        message: 'The supplier name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {           
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    
                    }
                }
            },
             mobile: {
                    validators: {
                        notEmpty: {
                            message: 'The mobile phone number is required'
                        },
                        digits: {
                            message: 'The mobile phone number is not valid'
                        }
                    }
                },
             street: {
                    validators: {
                        notEmpty: {
                            message: 'The address is required and cannot be empty'
                        }
                    }
                },
            city: {
                    validators: {
                        notEmpty: {
                            message: 'The city is required and cannot be empty'
                        }
                    }
                },
                state: {
                    validators: {
                        notEmpty: {
                            message: 'The state is required and cannot be empty'
                        }
                    }
                },
                
                zip: {
                    validators: {
                        notEmpty: {
                            message: 'The zip is required and cannot be empty'
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'The status is required and cannot be empty'
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
                        message: 'The supplier name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {           
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    
                    }
                }
            },
            mobile: {
                    validators: {
                        notEmpty: {
                            message: 'The mobile phone number is required and cannot be empty'
                        }
                     }
                },
            
             street: {
                    validators: {
                        notEmpty: {
                            message: 'The address is required and cannot be empty'
                        }
                    }
                },
            city: {
                    validators: {
                        notEmpty: {
                            message: 'The city is required and cannot be empty'
                        }
                    }
                },
                state: {
                    validators: {
                        notEmpty: {
                            message: 'The state is required and cannot be empty'
                        }
                    }
                },
                
                zip: {
                    validators: {
                        notEmpty: {
                            message: 'The zip is required and cannot be empty'
                        }
                    }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'The status is required and cannot be empty'
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
                        message: 'The Estimate name is required and cannot be empty'
                    }
                }
            },
            supplier_name: {
                validators: {
                    notEmpty: {
                        message: 'The supplier name is required and cannot be empty'
                    }
                }
            },
            phone: {
                    validators: {
                        notEmpty: {
                            message: 'The mobile phone number is required and cannot be empty'
                        }
                     }
                },
            
            email: {
                validators: {           
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    
                    }
                }
            },
            address: {
                    validators: {
                        notEmpty: {
                            message: 'The address is required and cannot be empty'
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
                        message: 'The Estimate name is required and cannot be empty'
                    }
                }
            },
            supplier_name: {
                validators: {
                    notEmpty: {
                        message: 'The supplier name is required and cannot be empty'
                    }
                }
            },
             phone: {
                    validators: {
                        notEmpty: {
                            message: 'The mobile phone number is required'
                        },
                        digits: {
                            message: 'The mobile phone number is not valid'
                        }
                    }
                },
            email: {
                validators: {           
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    
                    }
                }
            },
            address: {
                    validators: {
                        notEmpty: {
                            message: 'The address is required and cannot be empty'
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
                        message: 'The product name is required and cannot be empty'
                    }
                }
            },
            status: {
                validators: {
                    notEmpty: {
                        message: 'The Delivery status is required and cannot be empty'
                    }
                }
            },
            deliveredquantity: {
                validators: {
                    notEmpty: {
                        message: 'The Delivered quantity is required and cannot be empty'
                    }
                }
            },
            damagedquantity: {
                validators: {
                    notEmpty: {
                        message: 'The Damaged quantity is required and cannot be empty'
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
                        message: 'The Order name is required and cannot be empty'
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
                        message: 'The Supplier email is required and cannot be empty'
                    }
                }
            },
            address: {
                    validators: {
                        notEmpty: {
                            message: 'The address is required and cannot be empty'
                        }
                    }
                },  
                supplierTelephone: {
                    validators: {
                        notEmpty: {
                            message: 'The mobile phone number is required'
                        },
                        digits: {
                            message: 'The mobile phone number is not valid'
                        }
                    }
                },
            estimatedate: {
                    validators: {
                        notEmpty: {
                            message: 'The Estimate date is required and cannot be empty'
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
                        message: 'The First Name is required and cannot be empty'
                    }
                }
            },
            
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    }
                }
            },
             mobile: {
                    validators: {
                        notEmpty: {
                            message: 'The mobile phone number is required'
                        },
                        digits: {
                            message: 'The mobile phone number is not valid'
                        }
                    }
                },
            
            group: {
                    validators: {
                        notEmpty: {
                            message: 'The group is required and cannot be empty'
                        }
                     }
                },
            status: {
                    validators: {
                        notEmpty: {
                            message: 'The status is required and cannot be empty'
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
                        message: 'The First Name is required and cannot be empty'
                    }
                }
            },
            
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    }
                }
            },
             mobile: {
                    validators: {
                        notEmpty: {
                            message: 'The mobile phone number is required'
                        },
                        digits: {
                            message: 'The mobile phone number is not valid'
                        }
                    }
                },
                        
            group: {
                    validators: {
                        notEmpty: {
                            message: 'The group is required and cannot be empty'
                        }
                     }
                },
                status: {
                    validators: {
                        notEmpty: {
                            message: 'The status is required and cannot be empty'
                        }
                     }
                }
            
        }
        
    });

});