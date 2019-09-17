

<div class="tab-pane fade" id="disponibilite">
    <div class="form-group col-md-12">
        <form name="durefrm" method="POST" action="" id="durefrm">
            <table class="gestion-horaires" style="padding-top: 50px">
                <tbody>
                    <tr class="day1">
                        <td class="textleft bold">
                            <label for="duree">La durée des rendez-vous</label>
                            <select class="form-control select" name="duree" id="duree">
                                <option value="15"> 15 </option>
                                <option value="30"> 30 </option>
                                <option value="45"> 45 </option>
                                <option value="60"> 60 </option>
                            </select>
                        </td>
                        <td>
                            <button id="durebtn" name="durebtn" type="submit" class="btn btn-success">Valider</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>



        <form name="calendrier" method="POST" action="" id="calendrier">
            <div class="col-md-6">
                <h4>Horaire</h4>
                <table class="gestion-horaires" style="padding-top: 50px">
                    <tbody>
                        <tr class="day1">
                            <td class="textleft bold">
                                <select class="form-control select" name="jour">
                                    <option value="Lundi"> Lundi </option>
                                    <option value="Mardi"> Mardi </option>
                                    <option value="Mercredi"> Mercredi </option>
                                    <option value="Jeudi"> Jeudi </option>
                                    <option value="Vendredi"> Vendredi </option>
                                    <option value="Samedi"> Samedi </option>
                                    <option value="Dimanche"> Dimanche </option>
                                </select>
                            </td>

                            <td class="textright am text">de</td>
                            <td class="textright am">
                                <select class="form-control select" name="heureDebut">
                                    <option value="00:00:00"> 00:00 </option>
                                    <option value="01:00:00"> 01:00 </option>
                                    <option value="02:00:00"> 02:00 </option>
                                    <option value="03:00:00"> 03:00 </option>
                                    <option value="04:00:00"> 04:00 </option>
                                    <option value="05:00:00"> 05:00 </option>
                                    <option value="06:00:00"> 06:00 </option>
                                    <option value="07:00:00"> 07:00 </option>
                                    <option value="08:00:00"> 08:00 </option>
                                    <option value="09:00:00"> 09:00 </option>
                                    <option value="10:00:00"> 10:00 </option>
                                    <option value="11:00:00"> 11:00 </option>
                                    <option value="12:00:00"> 12:00 </option>
                                    <option value="13:00:00"> 13:00 </option>
                                    <option value="14:00:00"> 14:00 </option>
                                    <option value="15:00:00"> 15:00 </option>
                                    <option value="16:00:00"> 16:00 </option>
                                    <option value="17:00:00"> 17:00 </option>
                                    <option value="18:00:00"> 18:00 </option>
                                    <option value="19:00:00"> 19:00 </option>
                                    <option value="20:00:00"> 20:00 </option>
                                    <option value="21:00:00"> 21:00 </option>
                                    <option value="22:00:00"> 22:00 </option>
                                    <option value="23:00:00"> 23:00 </option>
                                </select>
                            </td>
                            <td class="textright am text">à</td>
                            <td class="textright am middle-hours ">
                                <select class="form-control select" name="heureFin">
                                    <option value="00:00:00"> 00:00 </option>
                                    <option value="01:00:00"> 01:00 </option>
                                    <option value="02:00:00"> 02:00 </option>
                                    <option value="03:00:00"> 03:00 </option>
                                    <option value="04:00:00"> 04:00 </option>
                                    <option value="05:00:00"> 05:00 </option>
                                    <option value="06:00:00"> 06:00 </option>
                                    <option value="07:00:00"> 07:00 </option>
                                    <option value="08:00:00"> 08:00 </option>
                                    <option value="09:00:00"> 09:00 </option>
                                    <option value="10:00:00"> 10:00 </option>
                                    <option value="11:00:00"> 11:00 </option>
                                    <option value="12:00:00"> 12:00 </option>
                                    <option value="13:00:00"> 13:00 </option>
                                    <option value="14:00:00"> 14:00 </option>
                                    <option value="15:00:00"> 15:00 </option>
                                    <option value="16:00:00"> 16:00 </option>
                                    <option value="17:00:00"> 17:00 </option>
                                    <option value="18:00:00"> 18:00 </option>
                                    <option value="19:00:00"> 19:00 </option>
                                    <option value="20:00:00"> 20:00 </option>
                                    <option value="21:00:00"> 21:00 </option>
                                    <option value="22:00:00"> 22:00 </option>
                                    <option value="23:00:00"> 23:00 </option>
                                </select>
                            <td>
                                <button id="ajout" name="ajout" type="submit" class="btn btn-success">Ajouter</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </form>
        <div class="col-md-6">
            <form name="modifcal" method="POST" action="" id="modifcal">
                <h4>Temps de travail</h4>
                <?php
                $temps = $em->getRepository('TempsTravail')->findByCalendrier($calendrier);
                foreach ($temps as $temp) {
                    ?>
                    <table class="gestion-horaires" style="padding-top: 50px">
                        <tbody>
                            <tr>
                                <td class="textleft bold">
                                <td style="width: 150px" class="textleft bold"><?php echo $temp->getJour(); ?> :</td>
                                </td>

                                <td class="textright am text">de</td>
                                <td class="textright am">
                                    <input name="temp[heureDebut]" type="time" value="<?php echo $temp->getHeureDebut()->format('H:i'); ?>" />
                                </td>
                                <td class="textright am text">à</td>
                                <td class="textright am middle-hours ">
                                    <input name="temp[heureFin]" type="time" value="<?php echo $temp->getHeureFin()->format('H:i'); ?>" />
                                <td>
                                    <a id="modiftemp" name='modiftemp' href="controlleur/modifierTemp.php?id=<?php echo $temp->getId() ?>" style="color: blue" class="btn btn-link"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                    <a href="controlleur/supprimerTemp.php?id=<?php echo $temp->getId() ?>" id="suprim" name="suprim"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                <?php }
                ?>
            </form>
        </div>
    </div>
</div>