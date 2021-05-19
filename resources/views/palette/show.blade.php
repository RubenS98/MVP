@extends('layouts.main')

@section('content')
    <br>
    <div class="container text-center">
        <h1>{{$palette->name}}</h1>
        <input type="submit" value="Share" class="btn btn-outline-primary" onclick="share()">
    </div>
    <br>
    <div id="photo" class="container-fluid" style="text-align: center">
        <div>
            <div class="row align-items-center border">
                @for ($i = 0; $i < count($colors); $i++)
                    <div id="color{{$i+1}}" value="{{$colors[$i]}}" class="col" style="height: 675px; background-color: {{$colors[$i]}}">
                        <h5 id="label{{$i+1}}" style="color: black">{{$colors[$i]}}</h5>
                    </div>
                @endfor
            </div>
        </div>
    </div>
    <div id="output">
    </div>
@endsection

@push('layout_end_body')

<script>
    var num = {!! count($colors) !!};
    var name = {!! json_encode($palette->name) !!};

    for(let i=1; i<=num; i++){
        temp=$("#color"+i).attr('value')
        c=w3color(temp);
        if(c.lightness<0.3){
            $("#label"+i).attr('style', "color: #e6e6e6");
        }
        else{
            $("#label"+i).attr('style', "color: black");
        }
    }

    function share(){
        let div = document.getElementById('photo');
  
        html2canvas(div).
            then(canvas => {
                document.body.appendChild(canvas);
                canvas.style.display = 'none';
                return canvas;
            })
            .then(canvas => {
                const image = canvas.toDataURL('image/png').replace('image/png', 'image/octet-stream');
                const a = document.createElement('a');
                a.setAttribute('download', name+'_palette.png');
                a.setAttribute('href', image);
                a.click();
                canvas.remove();
            })
    }

</script>

@endpush

