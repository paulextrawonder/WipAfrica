<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Account Details | WBN</title>
    @include('user.include.header')
  </head>

  <body>
    <div class="loader"></div>
    <div id="app">
      <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>

        @include('user.include.top-nav')
        @include('user.include.side-bar')

        <!-- Main Content -->
        <div class="main-content hd-100">
          <section class="section">
            <div class="section-body">
              <!-- add content here -->
              <div class="row mt-5 pb-4">
                <div class="col-lg-10 col-md-8 mx-md-auto">
                  <h6 class="heading__primary--h6 mt-large">Account Details</h6>
                  <div class="row mt-4">
                    <div class="col-xl-3 col-lg-3">
                      <center>
                        <img src="{{asset('users/profile_pic/'.$account->profile_pic)}}" class="pro_pics" />
                      </center>
                    </div>
                    <div class="col-xl-8 col-lg-8 mx-auto mt-m-large">
                      <form action="{{route('user.updateAccountDetails')}}" method="POST">
                        @method('Patch')
                        @csrf
                        <div class="form-group m-0 mb-3">
                          <label class="form__label"
                            >Beneficiary Account Number</label
                          >
                          <input
                            type="number"
                            class="form-control"
                            value="{{$account->bank_account_no ? $account->bank_account_no : ''}}"
                            placeholder="Account Number"
                            name="bank_account_no"
                            maxlength="10"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                          />
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label">Beneficiary Bank</label>
                          <select class="form-control" name="bank_name">
                            @if($account->bank_name)
                            <option value="{{$account->bank_name}}" selected>{{$account->bank_name}}</option>
                            @endif
                            <option value="" hidden> Select Bank</option>
                            <option value="AB MICROFINANCE BANK">
                              AB MICROFINANCE BANK
                            </option>
                            <option value="ACCESS BANK">ACCESS BANK</option>
                            <option value="ACCESS BANK (DIAMOND)">
                              ACCESS BANK (DIAMOND)
                            </option>
                            <option value="ALAT By WEMA">ALAT By WEMA</option>
                            <option value="CITIBANK NIGERIA">
                              CITIBANK NIGERIA
                            </option>
                            <option value="CORONATION MERCHANT BANK">
                              CORONATION MERCHANT BANK
                            </option>
                            <option value="ECOBANK NIGERIA">
                              ECOBANK NIGERIA
                            </option>
                            <option value="ENTERPRISE BANK">
                              ENTERPRISE BANK
                            </option>
                            <option value="EQUITORIAL TRUST BANK">
                              EQUITORIAL TRUST BANK
                            </option>
                            <option value="FIDELITY BANK">FIDELITY BANK</option>
                            <option value="FIRST BANK OF NIGERIA">
                              FIRST BANK OF NIGERIA
                            </option>
                            <option value="FIRST CITY MONUMENT BANK">
                              FIRST CITY MONUMENT BANK
                            </option>
                            <option value="GUARANTY TRUST BANK">
                              GUARANTY TRUST BANK
                            </option>
                            <option value="HERITAGE BANK">HERITAGE BANK</option>
                            <option value="JAIZ BANK">JAIZ BANK</option>
                            <option value="KEYSTONE BANK">KEYSTONE BANK</option>
                            <option value="KUDA MFB">KUDA MFB</option>
                            <option value="MAINSTREET BANK">
                              MAINSTREET BANK
                            </option>
                            <option value="OTHER (FOREIGN BANK)">
                              OTHER (FOREIGN BANK)
                            </option>
                            <option value="POLARIS BANK">POLARIS BANK</option>
                            <option value="PROVIDUS BANK">PROVIDUS BANK</option>
                            <option value="RAND MERCHANT BANK">
                              RAND MERCHANT BANK
                            </option>
                            <option value="STANBIC IBTC BANK">
                              STANBIC IBTC BANK
                            </option>
                            <option value="STANDARD CHARTERED BANK">
                              STANDARD CHARTERED BANK
                            </option>
                            <option value="STERLING BANK">STERLING BANK</option>
                            <option value="SUNTRUST BANK">SUNTRUST BANK</option>
                            <option value="TITAN TRUST BANK">
                              TITAN TRUST BANK
                            </option>
                            <option value="UNION BANK OF NIGERIA">
                              UNION BANK OF NIGERIA
                            </option>
                            <option value="UNITED BANK FOR AFRICA">
                              UNITED BANK FOR AFRICA
                            </option>
                            <option value="UNITY BANK">UNITY BANK</option>
                            <option value="VFD MICROFINANCE BANK">
                              VFD MICROFINANCE BANK
                            </option>
                            <option value="WEMA BANK">WEMA BANK</option>
                            <option value="ZENITH BANK">ZENITH BANK</option>
                          </select>
                        </div>
                        <div class="form-group m-0 mb-3">
                          <label class="form__label"
                            >Beneficiary Full Name</label
                          >
                          <input
                            type="tel"
                            class="form-control"
                            placeholder=""
                            name="bank_beneficiary_name"
                            value="{{$account->bank_beneficiary_name ? $account->bank_beneficiary_name : old('bank_beneficiary_name')}}"
                          />
                        </div>

                        <div class="form-group m-0 mb-3">
                          <label
                            for="submit"
                            class="btn btn-primary w-100 bg-main"
                            >Save Changes</label
                          >
                          <input type="submit" id="submit" hidden />
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
        @include('user.include.footer')
  </body>
</html>
