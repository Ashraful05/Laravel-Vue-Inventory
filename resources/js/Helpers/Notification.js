class Notification{
    success(){
        new Noty({
            type:"success",
            layout:'topRight',
            text:'Successfully done!!',
            timeout:1000
        }).show();
    }
    alert(){
        new Noty({
            type:"alert",
            layout:"bottomRight",
            text:"Are you Sure?",
            timeout:3000
        }).show();
    }
    warning(){
        new Noty({
            type:'warning',
            layout:'topRight',
            text:"oops!something wrong!",
            timout:2000
        }).show();
    }
    error(){
        new Noty({
            type:"error",
            layout:"topRight",
            text:"Something went wrong!!!",
            timeout:3000
        }).show();
    }
    imageValidation()
    {
        new Noty({
           type: 'error',
           layout: 'topRight',
           text: "Upload image less than 5 MB!!",
            timeout: 3000
        }).show();
    }
}
export default Notification = new Notification();
