@extends('admin.Layouts.app')
@section('title', 'Home Setting')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 mt-5" >


<table class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Input URL</th>
                        <th class="th-sm">Action</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Logo Upload:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2 text-center">
                                    <label for="addLogo" class="sr-only">logo</label>
                                    <input  id="addLogo" required type="file" class="form-control ">
                                    <hr>
                                    <img id="addimagepreview" style="width: 200px; height:120px !important;" class="imgPreview mt-3 border rounded" src="<?php if($results){ echo $results->logo;} ?>" />

                                </div>
                              </td>
                            <td>
                            <button id="submitLogo" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Title:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="addTitle" class="sr-only">Title</label>
                                    <textarea required name="" id="addTitle" class="form-control" cols="30" rows="10"><?php if ($results) {echo $results->title;}?></textarea>

                                </div>
                              </td>
                            <td>
                            <button id="submitTitle" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>

                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Primary Phone:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="addPhone" class="sr-only">mobile</label>
                                    <input  id="addPhone" required type="text" class="form-control "  value="<?php if ($results) {echo $results->phone;}?>">

                                </div>
                              </td>
                            <td>
                            <button id="submitPhone" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Another Phone:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="addPhone" class="sr-only">mobile</label>
                                    <input  id="addPhone2" required type="text" class="form-control "  value="<?php if ($results) {echo $results->phone;}?>">

                                </div>
                              </td>
                            <td>
                            <button id="submitPhone2" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>E Mail:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="addEmail" class="sr-only">E Mail</label>
                                    <input  id="addEmail" required type="text" class="form-control " value="<?php if ($results) {echo $results->email;}?>">

                                </div>
                              </td>
                            <td>
                            <button id="submitEmail" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Opening Hour:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="openingHour" class="sr-only">Opening Hour:</label>
                                    <textarea required name="" id="openingHour" class="form-control" cols="30" rows="10"><?php if ($results) {echo $results->opening_hour;}?></textarea>


                                </div>
                              </td>
                            <td>
                            <button id="submitOpeningHour" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Address:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="addAddress" class="sr-only">Address</label>
                                    <textarea required name="" id="addAddress" class="form-control" cols="30" rows="10"><?php if ($results) {echo $results->address;}?></textarea>


                                </div>
                              </td>
                            <td>
                            <button id="submitAddress" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group mb-2">
                                    <h3>Google Map:</h3>
                                </div>
                            </td>
                            <td>
                                <div class="form-group mx-sm-3 mb-2">
                                    <label for="addGmap" class="sr-only">Gmap</label>
                                    <textarea required name="" id="addGmap" class="form-control" cols="30" rows="10"><?php if ($results) {echo $results->gmap;}?></textarea>

                                </div>
                              </td>
                            <td>
                            <button id="submitGmap" type="submit" class="btn btn-primary mb-2">Update</button>
                            </td>
                        </tr>


                </tbody>
            </table>





            </div>
    </div>
</div>








@endsection

@section('script')
<script>

//Facebook Add

$('#submitFB').click(function () {
var facebook = $('#addfacebook').val();
addFacebook(facebook);
})

function addFacebook(facebook) {
if (facebook.length == 0) {
    toastr.error('Facebook url is empty!');

}  else {
    $('#submitFB').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/facebook', {
        facebook: facebook
    })
        .then(function (response) {
            $('#submitFB').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}










// Twitter Add


$('#submitTwitter').click(function () {
var twitter = $('#addTwitter').val();
addTwitter(twitter);
})

function addTwitter(twitter) {
if (twitter.length == 0) {
    toastr.error('Twitter url is empty!');

}  else {
    $('#submitTwitter').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/twitter', {
        twitter: twitter
    })
        .then(function (response) {
            $('#submitTwitter').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}








// Youtube Add


$('#submitYoutube').click(function () {
var youtube = $('#addYoutube').val();
addYoutube(youtube);
})

function addYoutube(youtube) {
if (youtube.length == 0) {
    toastr.error('Youtube url is empty!');

}  else {
    $('#submitYoutube').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/youtube', {
        youtube: youtube
    })
        .then(function (response) {
            $('#submitYoutube').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}




// Youtube Add


$('#submitInstagram').click(function () {
var instragram = $('#addInstagram').val();
addInstagram(instragram);
})

function addInstagram(instragram) {
if (instragram.length == 0) {
    toastr.error('Instagram url is empty!');

}  else {
    $('#submitInstagram').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/instragram', {
        instragram: instragram
    })
        .then(function (response) {
            $('#submitInstagram').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}





// Linked In Add


$('#submitLinkin').click(function () {
var linkin = $('#addLinkin').val();
addLinkin(linkin);
})

function addLinkin(linkin) {
if (linkin.length == 0) {
    toastr.error('Linked In url is empty!');

}  else {
    $('#submitLinkin').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/linkin', {
        linkin: linkin
    })
        .then(function (response) {
            $('#submitLinkin').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}




// Google Plus Add


$('#submitGoogle').click(function () {
var google = $('#addGoogle').val();
addGoogle(google);
})

function addGoogle(google) {
if (google.length == 0) {
    toastr.error('Google url is empty!');

}  else {
    $('#submitGoogle').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/google', {
        google: google
    })
        .then(function (response) {
            $('#submitGoogle').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}




// Address Add


$('#submitAddress').click(function () {
var address = $('#addAddress').val();
addAddress(address);
})

function addAddress(address) {
if (address.length == 0) {
    toastr.error('address url is empty!');

}  else {
    $('#submitAddress').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/address', {
        address: address
    })
        .then(function (response) {
            $('#submitAddress').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}


// Phone Add


$('#submitPhone').click(function () {
var phone = $('#addPhone').val();
addPhone(phone);
})

function addPhone(phone) {
if (phone.length == 0) {
    toastr.error('phone url is empty!');

}  else {
    $('#submitPhone').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/phone', {
        phone: phone
    })
        .then(function (response) {
            $('#submitPhone').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}

// phone 2


$('#submitPhone2').click(function () {
var phone2 = $('#addPhone2').val();
addPhone2(phone2);
})

function addPhone2(phone2) {
if (phone2.length == 0) {
    toastr.error('phone url is empty!');

}  else {
    $('#submitPhone2').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/phone2', {
        phone2: phone2
    })
        .then(function (response) {
            $('#submitPhone2').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}


// Email Add


$('#submitEmail').click(function () {
var email = $('#addEmail').val();
addEmail(email);
})

function addEmail(email) {
if (email.length == 0) {
    toastr.error('email url is empty!');

}  else {
    $('#submitTitle').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/email', {
        email: email
    })
        .then(function (response) {
            $('#submitTitle').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}



// Title Add


$('#submitTitle').click(function () {
var title = $('#addTitle').val();
console.log(title);

addTitle(title);
})

function addTitle(title) {
if (title.length == 0) {
    toastr.error('title url is empty!');

}  else {
    $('#submitTitle').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/title', {
        title: title
    })
        .then(function (response) {
            $('#submitTitle').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}




// Title Add


$('#submitGmap').click(function () {
var gmap = $('#addGmap').val();
addGmap(gmap);
})

function addGmap(gmap) {
if (gmap.length == 0) {
    toastr.error('gmap is empty!');

}  else {
    $('#submitGmap').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/gmap', {
        gmap: gmap
    })
        .then(function (response) {
            $('#submitGmap').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}






// Title Add


$('#submitOpeningHour').click(function () {
var OpeningHour = $('#openingHour').val();
addOpeningHour(OpeningHour);
})

function addOpeningHour(OpeningHour) {
if (OpeningHour.length == 0) {
    toastr.error('Opening Hour is empty!');

}  else {
    $('#submitOpeningHour').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation
    axios.post('/OpeningHour', {
        OpeningHour: OpeningHour
    })
        .then(function (response) {
            $('#submitOpeningHour').html("Update");
            if (response.status = 200) {
                if (response.data == 1) {
                    toastr.success('Updated Success .');


                } else {
                    toastr.error('Updated Failed');
                }
            } else {
                toastr.error('Something Went Wrong');
            }
        }).catch(function (error) {
            toastr.error('Something Went Wrong');
        });
    }
}





//Logo Add  save button

$('#submitLogo').click(function() {
var img = $('#addLogo').prop('files')[0];
addLogo(img);
})

$('#addLogo').change(function() {
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function(event) {
            var ImgSource = event.target.result;
            $('#addimagepreview').attr('src', ImgSource)
        }
    })


function addLogo(img) {


    $('#submitLogo').html(
        "<div class='spinner-border spinner-border-sm text-primary' role='status'></div>"); //animation

    console.log(img);
    var formData = new FormData();
    formData.append('photo', img);

    axios.post('/logo', formData, {
        headers: {
            'Content-Type': 'multipart/form-data'
        }
    }).then(function(response) {

        $('#submitLogo').html("Update");

        if (response.status = 200) {
            if (response.data == 1) {

                toastr.success('Updated Success .');

            } else {

                toastr.error('Updated Failed');

            }
        } else {

            toastr.error('Something Went Wrong');
        }


    }).catch(function(error) {


        toastr.error('Something Went Wrong');

    });



}








</script>
@endsection
