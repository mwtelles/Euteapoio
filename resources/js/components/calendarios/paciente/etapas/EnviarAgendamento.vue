<template>
  <div class="elegant-calencar" v-if="day != null && schedule != null && user != null">
    <button
      class="btn btn-primary"
      @click="$store.commit('resetToDay')"
      id="reset"
      style="z-index:99999"
    >Voltar</button>

    <div id="header-calendar">
      <div class="row">
        <div class="container" id="textCalendary">
          <div class="col-md-12" style="margin: auto">
            <button
              class="btn btn-outline-info"
              style="width: 90%;margin-top:50px;margin-bottom: 5px;"
            >Agendamento: {{$store.state.day}}/{{$store.state.month}}/{{$store.state.year}} das {{schedule.hour_start}} às {{schedule.hour_end}}</button>
              <button class="btn btn-outline-info" v-if="user.role == 1" style="width: 90%">Psicólogo: {{user.name}}</button>
              <button class="btn btn-outline-info" v-else style="width: 90%">Estagiário: {{user.name}}</button>
            <button v-if="schedulingStatus == false"
              @click="submitForm()"
              type="button"
              class="mt-1 btn btn-success"
              id="btn-saveScheduling"
              style="border-radius:10px;"
            >
              Agendar
              <span class="glyphicon glyphicon-send"></span>
            </button>
          </div>
        </div>
      </div>
    </div>
    <table id="calendar">
      <tbody v-if="schedulingStatus == false">
        <div class="container">
          <div class="row">
            <div class="container" id="box" style="border-radius: 20px;">
              <h5>Preencha para agendar sua consulta com o profissional selecionado:</h5>
              <div class="container">
                <div class="row">
                  <div class="form-group col-12">
                    <div class="input-group input-group-merge">
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-user"></i>
                        </span>
                      </div>-->
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Nome Completo *"
                        name="name"
                        required
                        v-model="patient.name"
                      />
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <div class="input-group input-group-merge">
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-envelope"></i>
                        </span>
                      </div>-->
                      <input
                        type="email"
                        class="form-control"
                        placeholder="Email *"
                        name="email"
                        v-model="patient.email"
                        required
                      />
                    </div>
                  </div>
                  <div class="form-group col-6">
                    <div class="input-group input-group-merge">
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-phone"></i>
                        </span>
                      </div>-->
                      <input
                        type="text"
                        class="form-control tel-ddd-mask"
                        name="whatsapp"
                        required
                        v-model="patient.whatsapp"
                        placeholder="Whatsapp *"
                      />
                    </div>
                  </div>
                  <div class="form-group col-12">
                    <div class="input-group input-group-merge">
                      <!-- <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="fas fa-comment-alt"></i>
                        </span>
                      </div>-->
                      <textarea
                        type="text"
                        class="form-control"
                        placeholder="Fale um pouco sobre você"
                        name="obs"
                        v-model="patient.obs"
                        rows="1"
                        style="resize: none;"
                      ></textarea>
                    </div>
                  </div>
                  <div class="p-0 jumbotron m-0 jumbotron-fluid col-12">
                    <div class="input-group input-group-merge">
                      <input
                        type="checkbox"
                        class="form-control"
                        name="is_minor"
                        style="margin:auto"
                        required
                        v-model="$store.state.patient.is_minor"
                        value="true"
                        id="is_minor"
                      />
                      <label
                        for="is_minor"
                        style="font-size:11px; margin:auto;width: 91%;"
                      >Sou menor de idade.</label>
                    </div>
                    <div class="form-group" v-if="$store.state.patient.is_minor">
                      <div class="input-group input-group-merge">
                        <input
                          type="date"
                          class="form-control"
                          name="bird"
                          style="margin:auto"
                          required
                          id="bird"
                        />
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="card card-info col-6">
                    <div class="input-group input-group-merge">
                      <input
                        type="checkbox"
                        class="form-control"
                        name="is_health"
                        style="margin:auto"
                        required
                        v-model="$store.state.patient.is_health"
                        value="true"
                        id="is_health"
                      />
                      <label
                        for="is_health"
                        style="font-size:11px; margin:auto;width: 91%;"
                      >Sou da área de saúde do HUV ou outros.</label>
                    </div>
                  </div>
                  <div class="card card-info col-6">
                    <div class="input-group input-group-merge">
                      <input
                        type="checkbox"
                        class="form-control"
                        name="is_security"
                        style="margin:auto"
                        required
                        v-model="$store.state.patient.is_security"
                        value="true"
                        id="is_security"
                      />
                      <label
                        for="is_security"
                        style="font-size:11px; margin:auto;width: 91%;"
                      >Sou da área de segurança.</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="card card-info col-12">
                    <div class="input-group input-group-merge">
                      <input
                        type="checkbox"
                        class="form-control"
                        name="terms"
                        style="margin:auto"
                        required
                        v-model="$store.state.terms"
                        value="true"
                        id="terms"
                      />
                      <label
                        for="terms"
                        style="font-size:11px; margin:auto;width: 91%;"
                      >Concordo com os Termos e Política de Privacidade.</label>
                    </div>
                  </div>
                </div>
                <a href="/termos" target="_blank">Termos</a> |
                <a href="/politica_de_privacidade" target="_blank">Política de Privacidade</a>
                <div
                  v-show="allFilled == false"
                  class="alert alert-danger"
                >Preencha os campos obrigatórios.</div>
              </div>
            </div>
          </div>
        </div>
      </tbody>
      <!-- SE FOI AGENDADO COM SUCESSO -->
      <tbody v-else-if="schedulingStatus == true && alreadyScheduled == false">
        <div
          class="alert alert-success"
          style="width: 100%; margin-bottom: 0px!important;border-radius: 20px!important;"
        >
          <p>Agendamento realizado com sucesso!</p>
          <h4>Em breve um especialista entrará em contato pelo número informado.</h4>
        </div>
        <div
          v-if="$store.state.patient.is_minor == true"
          class="alert alert-warning"
          style="width: 100%; margin-bottom: 0px!important;border-radius: 20px!important;"
        >
          <p>Solicite seu responsável para preencher o termo de autorização e envie-o preenchido (em foto ou escaneado) para o psicólogo no momento da consulta.</p>
          <a
            href="/docs/TERMODEAUTORIZACAO.pdf"
            class="btn btn-info"
            download="Termo de Autorização - Eu Te Apoio"
          >Download</a>
        </div>
      </tbody>
      <!-- SE JÁ FOI AGENDADO ANTES -->
      <tbody v-else-if="schedulingStatus == true && alreadyScheduled == true">
        <div
          class="alert alert-danger"
          style="width: 100%; margin-bottom: 0px!important;border-radius: 20px!important;"
        >
          <p>Ops... Parece que o horário foi selecionado por outro paciente antes de você.</p>
          <h4>Por favor, tente outro horário.</h4>
        </div>
      </tbody>
    </table>
  </div>
</template>

<script>
export default {
  computed: {
    terms: function() {
      return this.$store.state.terms;
    },
    allFilled: function() {
      return this.$store.state.allFilled;
    },
    submited: function() {
      return this.$store.state.submited;
    },
    day: function() {
      return this.$store.state.day;
    },
    schedule: function() {
      return this.$store.state.schedule;
    },
    user: function() {
      return this.$store.state.user;
    },
    users: function() {
      return this.$store.state.users;
    },
    schedules: function() {
      return this.$store.state.schedules;
    },
    schedulingStatus: function() {
      return this.$store.state.schedulingStatus;
    },
    alreadyScheduled: function() {
      return this.$store.state.alreadyScheduled;
    },
    patient: function() {
      return this.$store.state.patient;
    }
  },
  methods: {
    submitForm: function() {
      var vue = this;
      var submitButton = $("#btn-saveScheduling");
      vue.$store.state.allFilled = true;
      if (
        vue.terms &&
        vue.patient.name != "" &&
        vue.patient.whatsapp != "" &&
        vue.patient.email != "" &&
        vue.$store.state.submited == false
      ) {
        vue.$store.state.submited = true;
        vue.$store.state.allFilled = true;
        vue.$store.commit("saveScheduling");
        submitButton.html('<i class="fa fa-circle-notch fa-spin"></i>');
        submitButton.attr("disabled", "disabled");
      } else {
        vue.$store.state.allFilled = false;
      }
    }
  },
  updated() {
    $(".tel-ddd-mask").mask("(00) 000000009");
  }
};
</script>


