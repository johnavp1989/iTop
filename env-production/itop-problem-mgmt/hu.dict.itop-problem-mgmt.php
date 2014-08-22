<?php
// Copyright (C) 2010-2012 Combodo SARL
//
//   This file is part of iTop.
//
//   iTop is free software; you can redistribute it and/or modify	
//   it under the terms of the GNU Affero General Public License as published by
//   the Free Software Foundation, either version 3 of the License, or
//   (at your option) any later version.
//
//   iTop is distributed in the hope that it will be useful,
//   but WITHOUT ANY WARRANTY; without even the implied warranty of
//   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
//   GNU Affero General Public License for more details.
//
//   You should have received a copy of the GNU Affero General Public License
//   along with iTop. If not, see <http://www.gnu.org/licenses/>

/**
 * @copyright   Copyright (C) 2010-2012 Combodo SARL
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

Dict::Add('HU HU', 'Hungarian', 'Magyar', array(
	'Class:Problem' => 'Probléma',
	'Class:Problem+' => '',
	'Class:Problem/Attribute:status' => 'Státusz',
	'Class:Problem/Attribute:status+' => '',
	'Class:Problem/Attribute:status/Value:new' => 'Új',
	'Class:Problem/Attribute:status/Value:new+' => '',
	'Class:Problem/Attribute:status/Value:assigned' => 'Kiosztott',
	'Class:Problem/Attribute:status/Value:assigned+' => '',
	'Class:Problem/Attribute:status/Value:resolved' => 'Megoldott',
	'Class:Problem/Attribute:status/Value:resolved+' => '',
	'Class:Problem/Attribute:status/Value:closed' => 'Lezárt',
	'Class:Problem/Attribute:status/Value:closed+' => '',
	'Class:Problem/Attribute:org_id' => 'Ügyfél',
	'Class:Problem/Attribute:org_id+' => '',
	'Class:Problem/Attribute:service_id' => 'Szolgáltatás',
	'Class:Problem/Attribute:service_id+' => '',
	'Class:Problem/Attribute:servicesubcategory_id' => 'Szolgáltatás kategória',
	'Class:Problem/Attribute:servicesubcategory_id+' => '',
	'Class:Problem/Attribute:product' => 'Termék',
	'Class:Problem/Attribute:product+' => '',
	'Class:Problem/Attribute:impact' => 'Hatás',
	'Class:Problem/Attribute:impact+' => '',
	'Class:Problem/Attribute:impact/Value:1' => 'Felhasználókra',
	'Class:Problem/Attribute:impact/Value:1+' => '',
	'Class:Problem/Attribute:impact/Value:2' => 'Szolgáltatásokra',
	'Class:Problem/Attribute:impact/Value:2+' => '',
	'Class:Problem/Attribute:impact/Value:3' => 'Szervezeti egységre',
	'Class:Problem/Attribute:impact/Value:3+' => '',
	'Class:Problem/Attribute:urgency' => 'Sűrgősség',
	'Class:Problem/Attribute:urgency+' => '',
	'Class:Problem/Attribute:urgency/Value:1' => 'Nem fontos',
	'Class:Problem/Attribute:urgency/Value:1+' => '',
	'Class:Problem/Attribute:urgency/Value:2' => 'Fontos',
	'Class:Problem/Attribute:urgency/Value:2+' => '',
	'Class:Problem/Attribute:urgency/Value:3' => 'Nagyon fontos',
	'Class:Problem/Attribute:urgency/Value:3+' => '',
	'Class:Problem/Attribute:priority' => 'Prioritás',
	'Class:Problem/Attribute:priority+' => '',
	'Class:Problem/Attribute:priority/Value:1' => 'Alacsony',
	'Class:Problem/Attribute:priority/Value:1+' => '',
	'Class:Problem/Attribute:priority/Value:2' => 'Közepes',
	'Class:Problem/Attribute:priority/Value:2+' => '',
	'Class:Problem/Attribute:priority/Value:3' => 'Magas',
	'Class:Problem/Attribute:priority/Value:3+' => '',
	'Class:Problem/Attribute:workgroup_id' => 'Csoport',
	'Class:Problem/Attribute:workgroup_id+' => '',
	'Class:Problem/Attribute:agent_id' => 'Felelős',
	'Class:Problem/Attribute:agent_id+' => '',
	'Class:Problem/Attribute:related_change_id' => 'Kapcsolódó változások',
	'Class:Problem/Attribute:related_change_id+' => '',
	'Class:Problem/Attribute:close_date' => 'Lezárás dátuma',
	'Class:Problem/Attribute:close_date+' => '',
	'Class:Problem/Attribute:last_update' => 'Utolsó módosítás dátuma',
	'Class:Problem/Attribute:last_update+' => '',
	'Class:Problem/Attribute:assignment_date' => 'Felelőshöz rendelés',
	'Class:Problem/Attribute:assignment_date+' => '',
	'Class:Problem/Attribute:resolution_date' => 'Megoldás dátuma',
	'Class:Problem/Attribute:resolution_date+' => '',
	'Class:Problem/Attribute:knownerrors_list' => 'Ismert hibák',
	'Class:Problem/Attribute:knownerrors_list+' => '',
	'Class:Problem/Stimulus:ev_assign' => 'Hozzárendelés',
	'Class:Problem/Stimulus:ev_assign+' => '',
	'Class:Problem/Stimulus:ev_reassign' => 'Átrendelés',
	'Class:Problem/Stimulus:ev_reassign+' => '',
	'Class:Problem/Stimulus:ev_resolve' => 'Megoldás',
	'Class:Problem/Stimulus:ev_resolve+' => '',
	'Class:Problem/Stimulus:ev_close' => 'Lezárás',
	'Class:Problem/Stimulus:ev_close+' => '',
	'Menu:ProblemManagement' => 'Probléma menedzsment',
	'Menu:ProblemManagement+' => '',
	'Menu:Problem:Overview' => 'Áttekintő',
	'Menu:Problem:Overview+' => '',
	'Menu:NewProblem' => 'Új probléma',
	'Menu:NewProblem+' => '',
	'Menu:SearchProblems' => 'Probléma keresés',
	'Menu:SearchProblems+' => '',
	'Menu:Problem:Shortcuts' => 'Gyorsmenü',
	'Menu:Problem:MyProblems' => 'Saját problémák',
	'Menu:Problem:MyProblems+' => '',
	'Menu:Problem:OpenProblems' => 'Összes nyitott probléma',
	'Menu:Problem:OpenProblems+' => '',
	'UI-ProblemManagementOverview-ProblemByService' => 'Problémák szolgáltatásonként',
	'UI-ProblemManagementOverview-ProblemByService+' => '',
	'UI-ProblemManagementOverview-ProblemByPriority' => 'Problémák prioritás szerint',
	'UI-ProblemManagementOverview-ProblemByPriority+' => '',
	'UI-ProblemManagementOverview-ProblemUnassigned' => 'Nem kiosztott problémák',
	'UI-ProblemManagementOverview-ProblemUnassigned+' => '',
	'UI:ProblemMgmtMenuOverview:Title' => 'Probléma menedzsment dashboard',
	'UI:ProblemMgmtMenuOverview:Title+' => '',
	'Class:Problem/Attribute:org_name' => 'Neve',
	'Class:Problem/Attribute:org_name+' => '',
	'Class:Problem/Attribute:service_name' => 'Neve',
	'Class:Problem/Attribute:service_name+' => '',
	'Class:Problem/Attribute:servicesubcategory_name' => 'Neve',
	'Class:Problem/Attribute:servicesubcategory_name+' => '',
	'Class:Problem/Attribute:workgroup_name' => 'Neve',
	'Class:Problem/Attribute:workgroup_name+' => '',
	'Class:Problem/Attribute:agent_name' => 'Agent Neve',
	'Class:Problem/Attribute:agent_name+' => '',
	'Class:Problem/Attribute:agent_email' => 'Agent E-mail',
	'Class:Problem/Attribute:agent_email+' => '',
	'Class:Problem/Attribute:related_change_ref' => 'Referencia',
	'Class:Problem/Attribute:related_change_ref+' => '',
));
?>