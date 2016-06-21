<md-dialog>
  <md-content class="md-padding">
    <form method="post" action="caduser" enctype="multipart/form-data">
      <md-input-container class="md-block" flex-gt-xs>
            <label>ID (disabled)</label>
            <input name="cityId" type="number" disabled>
      </md-input-container>
      <md-input-container class="md-block" flex-gt-xs>
            <label>Nome da Cidade</label>
            <input name="countryId">
          </md-input-container>
      <md-input-container class="md-block" flex-gt-xs>
            <label>Distrito Governamental</label>
            <input name="countryId">
      </md-input-container>

      <md-button class="md-raised md-primary" type="submit">Enviar</md-button>
    </form>
  </md-content>
</md-dialog>