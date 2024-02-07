@extends('layouts.app')

@section('content')

{{-- 
<div class="ytVideo container w-100 text-center my-500 ratio ratio-16x9">
  <iframe src="https://www.youtube.com/embed/_g-D_itKkmQ?si=Jl5bfPW9J6jSfeAx"></iframe>
</div> --}}


{{-- <div class="modal-dialog modal-fullscreen-sm-down">
  <div class="embed-responsive w-100 embed-responsive-16by9">
    <iframe class="embed-responsive-item" style="min-width: 100vw; min-height: 40vh; " src="https://www.youtube.com/embed/_g-D_itKkmQ?si=Jl5bfPW9J6jSfeA" allowfullscreen=""></iframe>
  </div>
</div> --}}



{{-- <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe width="100%" height="auto" src="https://www.youtube.com/embed/_g-D_itKkmQ?si=AiU9FxWkydoAE99e" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
      </div>

    </div>
  </div>
</div> --}}


<!-- Button trigger modal -->
<div class="trejlerBtn">
  <button type="button" class="btn p-0 " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    <img src="assets/Trejler/NedeljaTrejeler.png"  alt="">
    <i class="fa-regular fa-circle-play fa-5x playICO"></i>
</button>

</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(100%) sepia(85%) saturate(0%) hue-rotate(238deg) brightness(103%) contrast(101%);"></button>
      </div>
      <div class="modal-body">
        <div class="ytVideo container w-100 text-center my-500 ratio ratio-16x9">
          <iframe src="https://www.youtube.com/embed/_g-D_itKkmQ?si=Jl5bfPW9J6jSfeAx"></iframe>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

{{-- 
  <iframe width="560" height="315" src="https://www.youtube.com/embed/_g-D_itKkmQ?si=AiU9FxWkydoAE99e" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
--}}
