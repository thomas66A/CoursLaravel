@include('includes.includeTop')
<div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            @include('includes.TopLinks')
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">

    <div class="row">
        <div class="col-2">
        @if(session()->has('message'))
            <div class="alert alert-success">
                <h3>
                {{ session()->get('message') }}
                </h3>
            </div>
        @endif
        @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $e)
                            <li>
                              {{ $e }}
                            </li>
                        @endforeach
                    </ul>
                </div>
        @endif
        {{Form::open(array(
            'route'=>'new-product',
            'method'=>'post'
        ))}}
            <div class="form-group">
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title','',['
                class'=>'form-control',
                'placeholder'=>'Titre']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Description') }}
                {{ Form::textarea('description','',['class'=>'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('prix', 'Prix') }}
                {{ Form::text('prix','',['class'=>'form-control','step'=>'any']) }}
            </div>

            <div class="form-group">
                {{ Form::label('reference', 'Reference') }}
                {{ Form::text('reference','',['class'=>'form-control']) }}
            </div>

            <div class="form-group">
                {{ Form::label('tva', 'Tva') }}
                {{ Form::select('tva',array(

                    '0.2'=>'20%',
                    '0.05'=>'5%'
                    )) }}
            </div>

            <div class="form-group">
                {{ Form::button('Valider',array(
                    'type'=>'submit',
                    'class'=>'btn btn-primary'
                    
                )) }}
                
            </div>

        {{Form::close()}}
        </div>
    </div>

    </div>
@include('includes.footer')