<script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/brain-socket.min.js"></script>

<div class="messenger bg-white">
    <div class="chat-header text-white bg-gray-dark">
        Real-time Chat
        <a href="#" id="chat-toggle" class="pull-right chat-toggle">
            <span class="glyphicon glyphicon-chevron-down"></span>
        </a>
    </div>
    <div class="messenger-body open">
        <ul class="chat-messages" id="chat-log">
 
        </ul>
        <div class="chat-footer">
            <div class="p-lr-10">
                <input type="text" id="chat-message"
                    class="input-light input-large brad chat-search" placeholder="Your message...">
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        // var fake_user_id = Math.floor((Math.random()*1000)+1);
        var fake_user_id = {{ Auth::user()->profile->id }};
        //make sure to update the port number if your ws server is running on a different one.
        window.app = {};
 
        app.BrainSocket = new BrainSocket(
                new WebSocket('ws://speakapp:8080'),
                new BrainSocketPubSub()
        );
 
        app.BrainSocket.Event.listen('generic.event',function(msg){
            console.log(msg);
            if(msg.client.data.user_id == fake_user_id){
                $('#chat-log').append('<li><img src="" class="img-circle" width="26"><div class="message">'+msg.client.data.message+'</div></li>');
            }else{
                var str_test='<li class="right"><img src="'+msg.client.data.user_portrait+'" class="img-circle" width="26"><div class="message">'+msg.client.data.message+'</div></li>';
                $('#chat-log').append(str_test);
            }
        });
 
        app.BrainSocket.Event.listen('app.success',function(data){
            console.log('An app success message was sent from the ws server!');
            console.log(data);
        });
 
        app.BrainSocket.Event.listen('app.error',function(data){
            console.log('An app error message was sent from the ws server!');
            console.log(data);
        });
 
        $('#chat-message').keypress(function(event) {
            if(event.keyCode == 13){
 			console.log('send message : '+$(this).val());
 
                app.BrainSocket.message('generic.event',
                        {
                            'message':$(this).val(),
                            'user_id':fake_user_id,
                            'user_portrait':''
                        }
                );
                $(this).val('');
 
            }
 
            return event.keyCode != 13; }
        );
    });
</script>

