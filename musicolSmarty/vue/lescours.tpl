{include file="../include/entete.html"}
<form method="post" class="d-flex justify-content-center align-items-center m-3" style="gap:
10px;">
    <label for="idJour" class="form-label">Journée</label>
    <select name="idJour" id="idJour" class="form-select" style="max-width: 150px;"
            onchange="this.form.submit()">
        {foreach $lesJours as $jour}
            <option value="{$jour.id}" {if $jour.id == $idJour} selected {/if}> {$jour.libelle}
            </option>
        {/foreach}
    </select>
</form>
<div style="max-width: 200px; margin: auto;">
    <table class='table table-condensed table-hover'>
        <tr>
            <th>Cours</th>
        </tr>
        {foreach $lesCours as $cours}
            <tr>
                <td>{$cours->getLibelle()}</td>
            </tr>
        {/foreach}
    </table>
</div>