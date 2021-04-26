import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { RouteModule } from './route/route.module';
import { SesionModule } from './sesion/sesion.module';
import { CommonModule } from '@angular/common';
import { NovedadesComponent } from './novedades/novedades.component';
import { PrincipalComponent } from './principal/principal.component';
import { NavbarComponent } from './navbar/navbar.component';
import { CoreModule } from './core/core.module';

@NgModule({
  declarations: [
    AppComponent,
  ],
  imports: [
    BrowserModule,
    CoreModule,
    RouteModule,
    SesionModule,
    CommonModule,
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }