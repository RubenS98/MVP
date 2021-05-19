@extends('layouts.main')

@section('content')
<br>
<div class="container text-center">
    <h1>Create your palette</h1>
</div>
<br>
<div class="container" style="width: 70%; text-align: center">
    <div class="card border border-dark">
        <div class="card-body">
            <form action="{{ route('palette.store') }}" method="POST" class="form-inline">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-4">
                        <input type="text" name="name" id="name" class="form-control col-4" placeholder="Palette name here...">
                    </div>
                </div>
                <br>
                <div class="row align-items-center justify-content-around">
                    <div id="pickerHolder" class="col-3">
                        <br>
                        @for ($i = 1; $i < 6; $i++)
                        <div id="picker{{$i}}">
                            <div class="form-group row">
                                <label class="col col-form-label">Color {{$i}}: </label>
                                <div class="col">
                                    <input type="color" class="form-control form-control-color form-control-lg" id="color{{$i}}" name="color{{$i}}" value="#ff0000">
                                </div>
                            </div>
                        <br>
                        </div>
                        @endfor
                    </div>
                    <div id="paletteHolder" class="col-4 border">
                        <div class="row justify-content-center">
                            <label class="btn btn-info" onclick="changeColor()">Refresh palette</label>
                        </div>
                        <br>
                        @for ($i = 1; $i < 6; $i++)
                            <div class="row justify-content-center" id="colored{{$i}}" name="colored{{$i}}" style="background-color: #ff0000">
                                <br>
                                <p id="label{{$i}}">#ff0000</p>
                                <br>
                            </div>
                        @endfor
                    </div>
                    <div class="col-3">
                        <div class="row justify-content-center">
                            <label class="btn btn-primary" onclick="addColor()">Add color</label>
                            <label class="btn btn-danger" onclick="removeColor()">Remove color</label>
                        </div>
                    </div>
                </div>
                <div class="row align-items-center">
                    <div class="text-center">
                        <input type="submit" value="Create Palette" class="btn btn-outline-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('layout_end_body')

<script>
    var num = 5;

    function changeColor() {
        let temp;
        console.log("Hello");
        for(let i=1; i<=num; i++){
            temp=$("#color"+i).val()
            $("#label"+i).html(temp);
            $('#colored'+i).attr('style', "background-color: "+temp);
            c=w3color(temp);
            if(c.lightness<0.3){
                $("#label"+i).attr('style', "color: #e6e6e6");
            }
            else{
                $("#label"+i).attr('style', "color: black");
            }
        }
    }

    function addColor() {

        if(num<8){
            num=num+1;
            $('#pickerHolder').append('<div id="picker'+num+'"><div class="form-group row"><label class="col col-form-label">Color '+num
                                        +':</label><div class="col"><input type="color" class="form-control form-control-color form-control-lg" id="color'
                                            +num+'" name="color'+num+'" value="#ff0000"></div></div><br></div>')
            $("#paletteHolder").append('<div class="row justify-content-center" id="colored'+num+'" name="colored'+num+'" style="background-color:#ff0000"><br><p id=label'+num+'>#ff0000</p><br></div>');
        }
    }

    function removeColor() {
        if(num>4){
            $('#colored'+num).remove();
            $('#picker'+num).remove();
            num=num-1;
        }
    }
</script>

@endpush