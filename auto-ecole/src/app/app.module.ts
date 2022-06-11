import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppRoutingModule, routingComponents } from './app-routing.module';
import { AppComponent } from './app.component';
import { FooterComponent } from './vitrine/footer/footer.component';
import { HeaderComponent } from './vitrine/header/header.component';
import { PackComponent } from './vitrine/pack/pack.component';
import {AccueilComponent} from './vitrine/accueil/accueil.component';
import { FonctionnaliteComponent } from './vitrine/fonctionnalite/fonctionnalite.component';


@NgModule({
  declarations: [
    AppComponent,
    FooterComponent,
    HeaderComponent,
    PackComponent,
    routingComponents,
    AccueilComponent,
    FonctionnaliteComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
