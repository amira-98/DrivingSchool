import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { CommonModule } from '@angular/common';
import { FacturationComponent } from './vitrine/facturation/facturation.component';
import { AgendaComponent } from './vitrine/agenda/agenda.component';
import { EleveComponent } from './vitrine/eleve/eleve.component';

import { ConnexionComponent } from './vitrine/connexion/connexion.component';
import { AccueilComponent } from './vitrine/accueil/accueil.component';
import { FonctionnaliteComponent } from './vitrine/fonctionnalite/fonctionnalite.component';
import { PackComponent } from './vitrine/pack/pack.component';

const routes: Routes = [
  {path : 'DevisFacturation', component: FacturationComponent},
  {path : 'Agenda', component: AgendaComponent},
  {path : 'GestionEléve', component: EleveComponent},

  {path : 'Connexion', component: ConnexionComponent},
  {path : 'Accueil', component: AccueilComponent},
  {path : 'Fonctionnalité', component: FonctionnaliteComponent},
  {path : 'Offre', component : PackComponent},
  
];

@NgModule({
  imports: 
  [RouterModule.forRoot(routes),
    CommonModule
  ],
  exports: [RouterModule],
  
})
export class AppRoutingModule { }
export const routingComponents = [FacturationComponent,AgendaComponent,EleveComponent
,ConnexionComponent, AccueilComponent,FonctionnaliteComponent,PackComponent]
