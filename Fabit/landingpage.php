<?php 
  include '../Fabit/app/views/header.php';
?>
    <main>
      <article>
        <!-- HERO -->
        <section class="section hero" aria-label="hero" data-section>
          <div class="container">
            <div class="hero-content">
              <h1 class="h1 hero-title">
                Discuss Everything Crypto on Fabit Square
              </h1>

              <p class="hero-text">
                Maker 0%<br />
                Taker 0.01%-0.02%
              </p>

              <a href="#" class="btn btn-primary">Market Place</a>
            </div>

            <figure class="hero-banner">
              <img
                src="./assets/images/eth hero.svg"
                width="570"
                height="448"
                alt="hero banner"
                class="w-100"
              />
            </figure>
          </div>
        </section>
        <!-- TREND -->
        <section class="section trend" aria-label="crypto trend" data-section>
          <div class="container">
            <div class="trend-tab">
              <ul class="tab-nav">
                <li>
                  <button class="tab-btn active">Crypto</button>
                </li>

                <li>
                  <button class="tab-btn">DeFi</button>
                </li>

                <li>
                  <button class="tab-btn">BSC</button>
                </li>

                <li>
                  <button class="tab-btn">NFT</button>
                </li>

                <li>
                  <button class="tab-btn">Metaverse</button>
                </li>

                <li>
                  <button class="tab-btn">Polkadot</button>
                </li>

                <li>
                  <button class="tab-btn">Solana</button>
                </li>

                <li>
                  <button class="tab-btn">Opensea</button>
                </li>

                <li>
                  <button class="tab-btn">Makersplace</button>
                </li>
              </ul>

              <ul class="tab-content">
                <li>
                  <div class="trend-card">
                    <div class="card-title-wrapper">
                      <img
                        src="./assets/images/coin-1.svg"
                        width="24"
                        height="24"
                        alt="bitcoin logo"
                      />

                      <a href="#" class="card-title">
                        Bitcoin <span class="span">BTC/USD</span>
                      </a>
                    </div>

                    <data class="card-value" value="46168.95"
                      >USD 46,168.95</data
                    >

                    <div class="card-analytics">
                      <data class="current-price" value="36641.20"
                        >36,641.20</data
                      >

                      <div class="badge red">-0.79%</div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="trend-card active">
                    <div class="card-title-wrapper">
                      <img
                        src="./assets/images/coin-2.svg"
                        width="24"
                        height="24"
                        alt="ethereum logo"
                      />

                      <a href="#" class="card-title">
                        Ethereum <span class="span">ETH/USD</span>
                      </a>
                    </div>

                    <data class="card-value" value="3480.04">USD 3,480.04</data>

                    <div class="card-analytics">
                      <data class="current-price" value="36641.20"
                        >36,641.20</data
                      >

                      <div class="badge green">+10.55%</div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="trend-card">
                    <div class="card-title-wrapper">
                      <img
                        src="./assets/images/coin-3.svg"
                        width="24"
                        height="24"
                        alt="tether logo"
                      />

                      <a href="#" class="card-title">
                        Tether <span class="span">USDT/USD</span>
                      </a>
                    </div>

                    <data class="card-value" value="1.00">USD 1.00</data>

                    <div class="card-analytics">
                      <data class="current-price" value="36641.20"
                        >36,641.20</data
                      >

                      <div class="badge red">-0.01%</div>
                    </div>
                  </div>
                </li>

                <li>
                  <div class="trend-card">
                    <div class="card-title-wrapper">
                      <img
                        src="./assets/images/coin-4.svg"
                        width="24"
                        height="24"
                        alt="bnb logo"
                      />

                      <a href="#" class="card-title">
                        BNB <span class="span">BNB/USD</span>
                      </a>
                    </div>

                    <data class="card-value" value="443.56">USD 443.56</data>

                    <div class="card-analytics">
                      <data class="current-price" value="36641.20"
                        >36,641.20</data
                      >

                      <div class="badge red">-1.24%</div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </section>
        <!-- MARKET -->
        <section class="section market" aria-label="market update" data-section>
          <div class="container">
            <div class="title-wrapper">
              <h2 class="h2 section-title">Market Update</h2>
              <a href="#" class="btn-link">See All Coins</a>
            </div>

            <div class="market-tab">
              <ul class="tab-nav">
                <li>
                  <button class="tab-btn active">View All</button>
                </li>

                <li>
                  <button class="tab-btn">Metaverse</button>
                </li>

                <li>
                  <button class="tab-btn">Entertainment</button>
                </li>

                <li>
                  <button class="tab-btn">Energy</button>
                </li>

                <li>
                  <button class="tab-btn">NFT</button>
                </li>

                <li>
                  <button class="tab-btn">Gaming</button>
                </li>

                <li>
                  <button class="tab-btn">Music</button>
                </li>
              </ul>

              <table class="market-table">
                <thead class="table-head">
                  <tr class="table-row table-title">
                    <th class="table-heading"></th>

                    <th class="table-heading" scope="col">#</th>

                    <th class="table-heading" scope="col">Name</th>

                    <th class="table-heading" scope="col">Last Price</th>

                    <th class="table-heading" scope="col">24h %</th>

                    <th class="table-heading" scope="col">Market Cap</th>

                    <th class="table-heading" scope="col">Last 7 Days</th>

                    <th class="table-heading"></th>
                  </tr>
                </thead>

                <tbody class="table-body">
                  <tr class="table-row">
                    <td class="table-data">
                      <button
                        class="add-to-fav"
                        aria-label="Add to favourite"
                        data-add-to-fav
                      >
                        <ion-icon
                          name="star-outline"
                          aria-hidden="true"
                          class="icon-outline"
                        ></ion-icon>
                        <ion-icon
                          name="star"
                          aria-hidden="true"
                          class="icon-fill"
                        ></ion-icon>
                      </button>
                    </td>

                    <th class="table-data rank" scope="row">1</th>

                    <td class="table-data">
                      <div class="wrapper">
                        <img
                          src="./assets/images/coin-1.svg"
                          width="20"
                          height="20"
                          alt="Bitcoin logo"
                          class="img"
                        />

                        <h3>
                          <a href="#" class="coin-name"
                            >Bitcoin <span class="span">BTC</span></a
                          >
                        </h3>
                      </div>
                    </td>

                    <td class="table-data last-price">$56,623.54</td>

                    <td class="table-data last-update green">+1.45%</td>

                    <td class="table-data market-cap">$880,423,640,582</td>

                    <td class="table-data">
                      <img
                        src="./assets/images/chart-1.svg"
                        width="100"
                        height="40"
                        alt="profit chart"
                        class="chart"
                      />
                    </td>

                    <td class="table-data">
                      <button class="btn btn-outline">Buy</button>
                    </td>
                  </tr>

                  <tr class="table-row">
                    <td class="table-data">
                      <button
                        class="add-to-fav"
                        aria-label="Add to favourite"
                        data-add-to-fav
                      >
                        <ion-icon
                          name="star-outline"
                          aria-hidden="true"
                          class="icon-outline"
                        ></ion-icon>
                        <ion-icon
                          name="star"
                          aria-hidden="true"
                          class="icon-fill"
                        ></ion-icon>
                      </button>
                    </td>

                    <th class="table-data rank" scope="row">2</th>

                    <td class="table-data">
                      <div class="wrapper">
                        <img
                          src="./assets/images/coin-2.svg"
                          width="20"
                          height="20"
                          alt="Ethereum logo"
                          class="img"
                        />

                        <h3>
                          <a href="#" class="coin-name"
                            >Ethereum <span class="span">ETH</span></a
                          >
                        </h3>
                      </div>
                    </td>

                    <td class="table-data last-price">$56,623.54</td>

                    <td class="table-data last-update red">-5.12%</td>

                    <td class="table-data market-cap">$880,423,640,582</td>

                    <td class="table-data">
                      <img
                        src="./assets/images/chart-2.svg"
                        width="100"
                        height="40"
                        alt="loss chart"
                        class="chart"
                      />
                    </td>

                    <td class="table-data">
                      <button class="btn btn-outline">Buy</button>
                    </td>
                  </tr>

                  <tr class="table-row">
                    <td class="table-data">
                      <button
                        class="add-to-fav"
                        aria-label="Add to favourite"
                        data-add-to-fav
                      >
                        <ion-icon
                          name="star-outline"
                          aria-hidden="true"
                          class="icon-outline"
                        ></ion-icon>
                        <ion-icon
                          name="star"
                          aria-hidden="true"
                          class="icon-fill"
                        ></ion-icon>
                      </button>
                    </td>

                    <th class="table-data rank" scope="row">3</th>

                    <td class="table-data">
                      <div class="wrapper">
                        <img
                          src="./assets/images/coin-3.svg"
                          width="20"
                          height="20"
                          alt="Tether logo"
                          class="img"
                        />

                        <h3>
                          <a href="#" class="coin-name"
                            >Tether <span class="span">USDT/USD</span></a
                          >
                        </h3>
                      </div>
                    </td>

                    <td class="table-data last-price">$56,623.54</td>

                    <td class="table-data last-update green">+1.45%</td>

                    <td class="table-data market-cap">$880,423,640,582</td>

                    <td class="table-data">
                      <img
                        src="./assets/images/chart-1.svg"
                        width="100"
                        height="40"
                        alt="profit chart"
                        class="chart"
                      />
                    </td>

                    <td class="table-data">
                      <button class="btn btn-outline">Buy</button>
                    </td>
                  </tr>

                  <tr class="table-row">
                    <td class="table-data">
                      <button
                        class="add-to-fav"
                        aria-label="Add to favourite"
                        data-add-to-fav
                      >
                        <ion-icon
                          name="star-outline"
                          aria-hidden="true"
                          class="icon-outline"
                        ></ion-icon>
                        <ion-icon
                          name="star"
                          aria-hidden="true"
                          class="icon-fill"
                        ></ion-icon>
                      </button>
                    </td>

                    <th class="table-data rank" scope="row">4</th>

                    <td class="table-data">
                      <div class="wrapper">
                        <img
                          src="./assets/images/coin-4.svg"
                          width="20"
                          height="20"
                          alt="BNB logo"
                          class="img"
                        />

                        <h3>
                          <a href="#" class="coin-name"
                            >BNB <span class="span">BNB/USD</span></a
                          >
                        </h3>
                      </div>
                    </td>

                    <td class="table-data last-price">$56,623.54</td>

                    <td class="table-data last-update red">-3.75%%</td>

                    <td class="table-data market-cap">$880,423,640,582</td>

                    <td class="table-data">
                      <img
                        src="./assets/images/chart-2.svg"
                        width="100"
                        height="40"
                        alt="loss chart"
                        class="chart"
                      />
                    </td>

                    <td class="table-data">
                      <button class="btn btn-outline">Buy</button>
                    </td>
                  </tr>

                  <tr class="table-row">
                    <td class="table-data">
                      <button
                        class="add-to-fav"
                        aria-label="Add to favourite"
                        data-add-to-fav
                      >
                        <ion-icon
                          name="star-outline"
                          aria-hidden="true"
                          class="icon-outline"
                        ></ion-icon>
                        <ion-icon
                          name="star"
                          aria-hidden="true"
                          class="icon-fill"
                        ></ion-icon>
                      </button>
                    </td>

                    <th class="table-data rank" scope="row">5</th>

                    <td class="table-data">
                      <div class="wrapper">
                        <img
                          src="./assets/images/coin-5.svg"
                          width="20"
                          height="20"
                          alt="Solana logo"
                          class="img"
                        />

                        <h3>
                          <a href="#" class="coin-name"
                            >Solana <span class="span">SOL</span></a
                          >
                        </h3>
                      </div>
                    </td>

                    <td class="table-data last-price">$56,623.54</td>

                    <td class="table-data last-update green">+1.45%</td>

                    <td class="table-data market-cap">$880,423,640,582</td>

                    <td class="table-data">
                      <img
                        src="./assets/images/chart-1.svg"
                        width="100"
                        height="40"
                        alt="profit chart"
                        class="chart"
                      />
                    </td>

                    <td class="table-data">
                      <button class="btn btn-outline">Buy</button>
                    </td>
                  </tr>

                  <tr class="table-row">
                    <td class="table-data">
                      <button
                        class="add-to-fav"
                        aria-label="Add to favourite"
                        data-add-to-fav
                      >
                        <ion-icon
                          name="star-outline"
                          aria-hidden="true"
                          class="icon-outline"
                        ></ion-icon>
                        <ion-icon
                          name="star"
                          aria-hidden="true"
                          class="icon-fill"
                        ></ion-icon>
                      </button>
                    </td>

                    <th class="table-data rank" scope="row">6</th>

                    <td class="table-data">
                      <div class="wrapper">
                        <img
                          src="./assets/images/coin-6.svg"
                          width="20"
                          height="20"
                          alt="XRP logo"
                          class="img"
                        />

                        <h3>
                          <a href="#" class="coin-name"
                            >XRP <span class="span">XRP</span></a
                          >
                        </h3>
                      </div>
                    </td>

                    <td class="table-data last-price">$56,623.54</td>

                    <td class="table-data last-update red">-2.22%</td>

                    <td class="table-data market-cap">$880,423,640,582</td>

                    <td class="table-data">
                      <img
                        src="./assets/images/chart-2.svg"
                        width="100"
                        height="40"
                        alt="loss chart"
                        class="chart"
                      />
                    </td>

                    <td class="table-data">
                      <button class="btn btn-outline">Buy</button>
                    </td>
                  </tr>

                  <tr class="table-row">
                    <td class="table-data">
                      <button
                        class="add-to-fav"
                        aria-label="Add to favourite"
                        data-add-to-fav
                      >
                        <ion-icon
                          name="star-outline"
                          aria-hidden="true"
                          class="icon-outline"
                        ></ion-icon>
                        <ion-icon
                          name="star"
                          aria-hidden="true"
                          class="icon-fill"
                        ></ion-icon>
                      </button>
                    </td>

                    <th class="table-data rank" scope="row">7</th>

                    <td class="table-data">
                      <div class="wrapper">
                        <img
                          src="./assets/images/coin-7.svg"
                          width="20"
                          height="20"
                          alt="Cardano logo"
                          class="img"
                        />

                        <h3>
                          <a href="#" class="coin-name"
                            >Cardano <span class="span">ADA</span></a
                          >
                        </h3>
                      </div>
                    </td>

                    <td class="table-data last-price">$56,623.54</td>

                    <td class="table-data last-update green">+0.8%</td>

                    <td class="table-data market-cap">$880,423,640,582</td>

                    <td class="table-data">
                      <img
                        src="./assets/images/chart-1.svg"
                        width="100"
                        height="40"
                        alt="profit chart"
                        class="chart"
                      />
                    </td>

                    <td class="table-data">
                      <button class="btn btn-outline">Buy</button>
                    </td>
                  </tr>

                  <tr class="table-row">
                    <td class="table-data">
                      <button
                        class="add-to-fav"
                        aria-label="Add to favourite"
                        data-add-to-fav
                      >
                        <ion-icon
                          name="star-outline"
                          aria-hidden="true"
                          class="icon-outline"
                        ></ion-icon>
                        <ion-icon
                          name="star"
                          aria-hidden="true"
                          class="icon-fill"
                        ></ion-icon>
                      </button>
                    </td>

                    <th class="table-data rank" scope="row">8</th>

                    <td class="table-data">
                      <div class="wrapper">
                        <img
                          src="./assets/images/coin-8.svg"
                          width="20"
                          height="20"
                          alt="Avalanche logo"
                          class="img"
                        />

                        <h3>
                          <a href="#" class="coin-name"
                            >Avalanche <span class="span">AVAX</span></a
                          >
                        </h3>
                      </div>
                    </td>

                    <td class="table-data last-price">$56,623.54</td>

                    <td class="table-data last-update green">+1.41%</td>

                    <td class="table-data market-cap">$880,423,640,582</td>

                    <td class="table-data">
                      <img
                        src="./assets/images/chart-1.svg"
                        width="100"
                        height="40"
                        alt="profit chart"
                        class="chart"
                      />
                    </td>

                    <td class="table-data">
                      <button class="btn btn-outline">Buy</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </section>
        <!-- OUR SERVICES -->
        <section class="section services" aria-label="services" data-section>
          <div class="container">
            <div class="title-wrapper">
              <h2 class="h2 section-title">Our Services</h2>
            </div>
            <div class="services-tab">
              <ul class="service-list">
                <li class="service-item">
                  <div class="circle"></div>
                  <h3 class="service-content">Crypto Market</h3>
                  <p class="service-description">
                    In April 2021, Fabit became the world’s largest publicly
                    traded cryptocurrency company (NASDAQ). We are operating
                    with greater transparency and publishing our financial
                    reports every quarter.
                  </p>
                </li>
                <li class="service-item">
                  <div class="circle"></div>
                  <h3 class="service-content">
                    Your cryptocurrencies are safe
                  </h3>
                  <p class="service-description">
                    At Fabit, your crypto is yours! We don’t use your assets
                    without your permission or lend them. We also offer secure
                    risk management programs designed to protect our customers’
                    assets.
                  </p>
                </li>
                <li class="service-item">
                  <!-- <div class="circle purple"></div> -->
                  <div class="circle"></div>
                  <h3 class="service-content">Secure Wallet</h3>
                  <p class="service-description">
                    Fabit has obtained a PSAN registration from the AMF. This
                    requires Coinbase to comply with the strict rules imposed by
                    the AMF and the ACPR. This helps us provide a better and
                    more reliable experience to our customers.
                  </p>
                </li>
              </ul>
            </div>
          </div>
        </section>
        <!-- PLATFORM -->
        <section class="section platform" aria-label="platform" data-section>
          <div class="container">
            <div class="platform-tab">
              <div class="platform-img">
                <img src="./assets/images/Macbook Air (2022).svg" alt="" />
              </div>

              <div class="platform-content">
                <h2 class="platform-title">
                  Professional and Trusted Crypto Platform
                </h2>
                <p class="platform-description">
                  Creating a very beautiful website design in accordance with
                  the fundamental user experience which is examined more deeply
                  by the UX Designers that we have. And make good visuals so
                  that clients are satisfied and easy when viewing the website.
                  First impressions are our tricks to attract a customer who has
                  seen the website that we are going to create
                </p>
                <a href="#" class="btn btn-primary">Learn Now</a>
              </div>
            </div>
          </div>
        </section>
        <!-- CHOOES -->
        <section class="section choose" aria-label="choose" data-section>
          <div class="container">
            <div class="choose-tab">
              <div class="choose-content">
                <h2 class="choose-title">Why Choose Us</h2>
                <ul class="choose-list">
                  <li class="choose-item">
                    <div class="circle"></div>
                    <div class="div">
                      <h3 class="choose-content">
                        Triple-Layer Asset Protection
                      </h3>
                      <p class="choose-description">
                        Make the appearance of a mobile application that has
                        quality and increases user convenience
                      </p>
                    </div>
                  </li>
                  <li class="choose-item">
                    <div class="circle"></div>
                    <div>
                      <h3 class="choose-content">Privacy Protection</h3>
                      <p class="choose-description">
                        We are transparent about the data we gather from you,
                        clearly stating how we utilize and share it.
                      </p>
                    </div>
                  </li>
                  <li class="choose-item">
                    <div class="circle"></div>
                    <div>
                      <h3 class="choose-content">Advanced Data Protection</h3>
                      <p class="choose-description">
                        Strict authorization controls are in place to ensure
                        that only you can access your personal and private
                        information.
                      </p>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="choose-img">
                <img src="./assets/images/why choose us.svg" alt="" />
              </div>
            </div>
          </div>
        </section>
        <!-- statistical -->
        <section
          class="section statistical"
          aria-label="statistical"
          data-section
        >
          <div class="container">
            <div class="title-wrapper">
              <h2>Trusted by Millions People All Around World</h2>
            </div>
            <ul class="statistical-list">
              <li class="statistical-item">
                <h3>50 Billions+</h3>
                <p>Transaction</p>
              </li>
              <li class="statistical-item">
                <h3>100+</h3>
                <p>Professional</p>
              </li>
              <li class="statistical-item">
                <h3>150+</h3>
                <p>Country</p>
              </li>
              <li class="statistical-item">
                <h3>1 Millions+</h3>
                <p>Active Users</p>
              </li>
            </ul>
          </div>
        </section>
        <!-- CONVERTER -->
        <section class="section converter" aria-label="converter" data-section>
          <div class="container">
            <div class="title-wrapper">
              <h2>Crypto Converter</h2>
            </div>
            <p>Last Update : 2024-09-29 13:32</p>
            <div class="converter-select">
              <select name="quantity" id="select1" title="Select Quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>

              <select name="amount" id="select2" title="Select Amount">
                <option value="32.654354">$32.654.354</option>
                <option value="12.546654">$12.546.654</option>
                <option value="8.321564">$8.321.564</option>
              </select>
            </div>
            <a href="#" class="btn btn-primary">convert now</a>
          </div>
        </section>
        <!-- LATEST -->
        <section class="section latest" aria-label="latest" data-section>
          <div class="container">
            <div class="title-wrapper">
              <h2 class="h2 section-title">Our Latest News</h2>
            </div>

            <ul class="latest_list">
              <li class="latest-item">
                <img src="./assets/images/news1.png" alt="" />
                <h3>Bitcoin price metrics align to project further upside for BTC</h3>
                <span>Cointelegraph By Marcel Pechman</span>
                <p>
                Bitcoin (BTC) surged by 10.5% to hit a new all-time high at $75,350 from Nov. 
                5 to Nov. 6 following former US President Donald Trump's win....
                </p>
                <button>Read More</button>
              </li>
              <li class="latest-item">
                <img src="./assets/images/livechart.png" alt="" />
                <h3>Elon to Put Dogecoin on the Moon</h3>
                <span>Robert Hayden</span>
                <p>
                The current price of Dogelon Mars is $0.00000017 per ELON. With a circulating supply of 
                549,652,770,159,583.3 ELON, it means that Dogelon Mars has a total market cap of $91,160,375.16. 
                The amount of Dogelon Mars traded has risen by....
                </p>
                <button>Read More</button>
              </li>
              <li class="latest-item">
                <img src="./assets/images/macmining.jpg" alt="" />
                <h3>
                  Crypto Mining on Mac’s: Trying out Kryptex on a MacBook Pro
                  16"
                </h3>
                <span>Robert Hayden</span>
                <p>
                  Video showing Kryptex benchmark results on a MacBook Pro 16″
                  (MacBook Pro16,4) 2.4GHz 8-Core 5600M. According to the miner,
                  I could make $65 monthly mining with CPU and GPU. The miner
                  feels very basic and hides....
                </p>
                <button>Read More</button>
              </li>
            </ul>
          </div>
        </section>
        <!-- DOWNLOAD -->
        <section class="section download" aria-label="download" data-section>
          <div class="container">
            <div class="download-tab">
              <div class="download-img">
                <img src="./assets/images/download our app.svg" alt="" />
              </div>

              <div class="download-content">
                <h2 class="download-title">Download Our App</h2>
                <p class="download-description">
                  Trade on the go. Anywhere,anytime.
                </p>
                <img src="./assets/images/Google Play Logo.svg" alt="" />
                <img src="./assets/images/Appstore Logo.svg" alt="" />
              </div>
            </div>
          </div>
        </section>
      </article>
    </main>

<?php
  include '../Fabit/app/views/footer.php';
?>


    <!-- custom js link -->
    <script src="./assets/js/script.js" defer></script>
    <!-- ionicon link -->
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
    <script src="assets/js/captcha.js"></script>
    <script src="assets/js/progressbar.js"></script>
    <script src="assets/js/theme_change.js"></script>
  </body>
</php>
