@extends('back.app')

@section('title','dashboard-Social')


@section('dashboard-header')

<div class="row align-items-center">
    <div class="col">
      <h3 class="page-title mt-5">@if(isset($social)) Modifier  @else Ajouter @endif  un reseau social</h3>
    </div>
</div>
@endsection
@section('dashboard-content')
<div class="row">
    <div class="col-lg-12">
      <form action="{{isset($social)? route('social.update', $social):  route('social.store')}}" method="post">
        @csrf
        @if(isset($social))
          @method('PUT')
        @endif

        <div class="row formtype">
          <div class="col-md-4">
            <div class="form-group">
              <label>Nom du reseau</label>
              <input
                class="form-control"
                name="name"
                value="{{isset($social)? old('name',$social->name) : old('name')}} "
                type=" text "
              />
            </div>
           </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Lien</label>
              <input
                class="form-control"
                name="lien"
                value="{{isset($social)? old('lien',$social->lien) :  old('lien')}}"
                type="text"
              />
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label>Icon</label>
              <input
                class="form-control"
                name="icon"
                value="{{isset($social)? old('icon', $social->icon): old('icon')}}"
                type="text"
              />
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary buttonedit1">
        @isset($social) Modifier @else Ajouter @endif
        </button>
      </form>
    </div>
  </div>
@endsection





