@extends('layouts.app')

@section('content')
<div>
    <nav class="navbar nav-expand-lg filter-navbar">

        <div class="container justify-content-center">
            <ul>
                <li class="nav-item">
                  <i class="fa-regular fa-calendar-days">:</i>
                  <label for="#datumi" class="hidden-mobile">Datum:</label>
                    <select name="datum" id="datumi" class="filter-select">
                    </select>
                </li>
                <div class="vr hidden-xs hidden-mobile"></div>
                <li>
                  <label for="#projekcija">Vrsta Projekcije:</label>
                  <select name="" id="projekcija" class="filter-select">
                    <option value="all">Sve</option>
                    <option value="2D">2D</option>
                    <option value="3D">3D</option>
                  </select>
                </li>
                <div class="vr hidden-xs hidden-mobile"></div>
                <li>
                  <label for="#zanr">Zanr:</label>
                  
                    <select name="" id="zanr" class="filter-select">
                      <option value="all">Sve</option>
                      <option value="akcija">Akcija</option>
                      <option value="animacija">Animirani</option>
                      <option value="avantura">Avantura</option>
                      <option value="biografija">Biografski</option>
                      <option value="drama">Drama</option>
                      <option value="horor">Horor</option>
                      <option value="komedija">Komedija</option>
                      <option value="misterija">Misterija</option>
                      <option value="triler">Triler</option>
                    </select>
                  
                  
                </li>

            </ul>



        </div>
    </nav>
</div>

    
@endsection
