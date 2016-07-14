@extends('master')

@section('content')
    <div id="app" style="background-color:white">
        <form class="form-horizontal" action="#" method="post" @submit.prevent>
            <div class="row">
                <div class="form-group" v-for="message in messages">
                    <div class="col-md-4 col-md-offset-2">
                        <input type="text" name="title" v-model="message.title" class="form-control" placeholder="Title">
                        <textarea name="name" rows="2" cols="40" v-model="message.body" class="form-control" placeholder="Body"></textarea>
                        <select class="form-control" name="" v-model="message.id">
                            <option value="1">Item 1</option>
                            <option value="2">Item 2</option>
                            <option value="3">Item 3</option>
                            <option value="4">Item 4</option>
                        </select>
                    </div>
                </div>
            </div>
            <pre>
                @{{ messages | json }}
            </pre>
            <button type="button" name="button" @click="addNewMessage" class="btn btn-primary btn-md">New Message</button>
        </form>
    </div>

@endsection
@push('scripts')
    <script>
        new Vue({
                el: '#app',
                data: {
                        messages: [{
                            title: '',
                            body: '',
                            id: '',
                        }],
                },
                methods: {
                    addNewMessage: function (){
                        this.messages.push({
                            title: '',
                            body: ''
                        });
                    },
                },
        });

    </script>
@endpush
