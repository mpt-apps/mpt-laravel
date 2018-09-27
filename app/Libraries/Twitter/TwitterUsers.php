<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/09/18
 * Time: 09:34 AM
 */

namespace App\Libraries\Twitter;


class TwitterUsers extends Twitter
{

    /**
     * Get user data from twitter according with the screen_name
     *
     * @param string $screen_name
     * @return mixed
     */
    function getUser($screen_name='miputotuit')
    {
        $url = "https://api.twitter.com/1.1/users/show.json";
        $query = array(
            'screen_name' => urlencode($screen_name)
        );
        $user = $this->getTwitterData('GET', $url, $query);
        return $user;

    }

    /**
     * Return one influencer randomly from almost 1000 twitter users
     *
     * @return mixed
     */
    function getRandomUser()
    {
        $screen_names = [
                        'katyperry', 'justinbieber', 'taylorswift13', 'rihanna', 'ladygaga', 'jtimberlake', 'TheEllenShow', 'britneyspears', 'Cristiano', 'KimKardashian', 'katyperry', 'justinbieber', 'taylorswift13', 'rihanna', 'ladygaga', 'jtimberlake',
                        'TheEllenShow', 'britneyspears', 'Cristiano', 'KimKardashian', 'shakira', 'selenagomez', 'JLo', 'ArianaGrande', 'ddlovato', 'jimmyfallon', 'Oprah', 'Pink', 'Drake', 'Harry_Styles', 'onedirection', 'BillGates', 'KingJames',
                        'LilTunechi', 'BrunoMars', 'KAKA', 'Adele', 'NiallOfficial', 'MileyCyrus', 'aliciakeys', 'KevinHart4real', 'wizkhalifa', 'pitbull', 'Real_Liam_Payne', 'Louis_Tomlinson', 'NICKIMINAJ', 'neymarjr', 'Eminem', 'EmWatson', 'AvrilLavigne',
                        'ActuallyNPH', 'danieltosh', 'davidguetta', 'ConanOBrien', 'SrBachchan', 'aplusk', 'khloekardashian', 'kourtneykardash', 'zaynmalik', 'iamsrk', 'coldplay', 'MariahCarey', 'edsheeran', 'xtina', 'JimCarrey', 'kanyewest', 'chrisbrown',
                        'aamir_khan', 'BeingSalmanKhan', 'agnezmo', 'Beyonce', 'blakeshelton', 'RyanSeacrest', 'ivetesangalo', 'LeoDiCaprio', 'ParisHilton', 'iamwill', 'MohamadAlarefe', 'KendallJenner', 'ashleytisdale', 'tyrabanks', 'SnoopDogg',
                        'AlejandroSanz', 'ricky_martin', '10Ronaldinho', 'SimonCowell', 'WayneRooney', 'KDTrey5', 'maroon5', 'radityadika', 'KylieJenner', 'ClaudiaLeitte', 'DaniloGentili', 'shugairi', 'marcosmion', 'deepikapadukone', 'stephenfry',
                        'charliesheen', 'andresiniesta8', 'iHrithik', 'priyankachopra', 'LucianoHuck', '3gerardpique', 'ZacEfron', 'carlyraejepsen', 'rustyrockets', 'juanes', 'paurubio', 'iamdiddy', 'Ludacris', 'SHAQ', 'paulocoelho', 'SabrinaSatoReal',
                        'kelly_clarkson', 'tomhanks', 'Dr_alqarnee', 'Usher', 'akshaykumar', 'LunaMaya26', 'rickygervais', 'MesutOzil1088', 'sherinasinna', 'CMYLMZ', 'nickjonas', 'XabiAlonso', 'TheRock', 'enrique305', 'StephenAtHome', 'aguerosergiokun',
                        'VictoriaJustice', 'FALCAO', 'lindsaylohan', 'arrahman', 'AustinMahone', 'victoriabeckham', 'jamesdrodriguez', 'TreySongz', 'SofiaVergara', 'jessicaalba', 'RafaelNadal', 'rafinhabastos', 'daddy_yankee', 'afgansyah_reza', 'Anahi', 'LMFAO',
                        'realwbonner', 'imVkohli', 'JessieJ', 'vidialdiano', 'annecurtissmith', 'sachin_rt', 'MarceloTas', 'mishari_alafasy', 'Carles5puyol', 'SethMacFarlane', 'thalia', 'MarcAnthony', 'cesc4official', '50cent', 'Pharrell', 'joejonas', 'BigSean',
                        '5SOS', 'azizansari', 'kobebryant', 'davidbisbal', 'juniorbachchan', 'Tatawerneck', 'channingtatum', 'Persie_Official', 'sonamakapoor', 'CodySimpson', 'LuisFonsi', 'marcoluque', 'DavidLuiz_4', 'GarethBale11', 'JohnCena', 'EugenioDerbez',
                        'JColeNC', 'elissakh', 'MirandaCosgrove', 'johnlegend', 'EvaLongoria', 'salman_alodah', 'karanjohar', 'Guaje7Villa', 'CherLloyd', 'JessicaSimpson', 'NancyAjram', 'SpiderAnderson', 'montanertwiter', 'LittleMix', 'carmeloanthony',
                        'SarahKSilverman', 'shahidkapoor', 'Tyga', 'ChespiritoRGB', 'snooki', 'cuervotinelli', '143redangel', 'IAMQUEENLATIFAH', 'ZooeyDeschanel', 'simonpegg', 'RaffiAhmadLagi', 'NeYoCompound', 'CalvinHarris', 'richardbranson', 'ciara',
                        'SteveMartinToGo', 'ollyofficial', 'DaniAlvesD2', 'KELLYROWLAND', 'Fearnecotton', 'rioferdy5', 'FloydMayweather', 'Luke5SOS', 'shireensungkar', 'jedarcantik', 'andersoncooper', 'MTLovenHoney', 'FabioPorchat', 'FarOutAkhtar',
                        'jennettemccurdy', 'gusttavo_lima', 'bellathorne', 'pittyleone', 'hollywills', 'JuanLuisGuerra', 'Tip', 'PerezHilton', 'DwightHoward', 'CHAYANNEMUSIC', 'Ricardo_Arjona', 'aliaa08', 'vicegandako', 'Zendaya', 'DulceMaria', 'oceara',
                        'iansomerhalder', 'KrisJenner', 'jimmykimmel', 'RealHughJackman', 'luansantana', 'IGGYAZALEA', 'GalileaMontijo', 'AnushkaSharma', 'robkardashian', 'Akon', 'jason_mraz', 'ninadobrev', 'OMARCHAPARRO', 'SergioRamos', 'rodrigovesgo',
                        'LanaDelRey', 'sonakshisinha', 'Mascherano', 'chetan_bhagat', 'Calum5SOS', 'CH14_', 'jk_rowling', 'official_flo', 'chelseahandler', 'atademirer', 'ScottDisick', 'CherylOfficial', 'officialjaden', 'LuisSuarez9', 'ParineetiChopra',
                        'RobertDowneyJr', 'G_Higuain', 'jimmycarr', 'TomCruise', 'kendricklamar', 'serenawilliams', 'Residente', 'adamlevine', 'CarlosLoret', 'JeremyClarkson', 'ahickmann', 'Talhabeeb', 'VanessaHudgens', 'TareqAlSuwaidan', 'JKCorden',
                        'Michael5SOS', 'elliegoulding', 'camerondallas', 'lopezdoriga', 'DrBassemYoussef', 'thekiranbedi', 'raisa6690', 'lilyallen', 'AnupamPkher', 'MichelleObama', 'maryjblige', 'oserginho', 'justdemi', 'bernardokath', 'SamuelLJackson',
                        'NicoleScherzy', 'bep', 'Ahlam_Alshamsi', 'okanbayulgen', 'INDONESIAinLOVE', 'amrkhaled', 'MeekMill', 'antanddec', 'CasillasWorld', 'RitaOra', 'lulopilato', 'Fiuk', 'NickCannon', 'bepe20s', 'SandyLeah', 'mirandalambert', 'Angelluisr',
                        'Nashgrier', 'bclsinclair', 'RedHourBen', 'DemetAkalin', 'YengPLUGGEDin', 'mindykaling', 'LukeBryanOnline', 'siwon407', 'MacMiller', 'D_DeGea', 'juanmata8', 'TigerWoods', 'MikeTyson', 'LennyKravitz', 'kevinjonas', 'JonahHill', 'DwyaneWade',
                        'nicolerichie', 'linkinpark', 'HilaryDuff', 'ImRaina', 'RNTata2000', 'ariyoshihiroiki', 'IBGDRGN', 'AnnaKendrick47', 'AlanCarr', 'sectorkekz', 'wossy', 'lucyhale', 'bridgitmendler', 'donghae861015', 'JohnCleese', 'souljaboy', 'PrinceRoyce',
                        'TiagoLeifert', 'carrieunderwood', 'jesseyjoy', 'yokoono', 'olla_ramlan', 'DjokerNole', 'gabyespino', 'Bellaudyaa', 'tyleroakley', 'johngreen', 'BillSimmons', 'DiegoForlan7', 'llcoolj', 'facufacundo', 'msleamichele', 'iamsuperbianca',
                        'msdhoni', 'piersmorgan', 'Skrillex', 'virendersehwag', 'jorgeemateus', 'gitagut', 'Lord_Sugar', 'MonsieurDream', 'CP3', 'iamjamiefoxx', 'IrfanBachdim10', 'kc_concepcion', 'imdanielpadilla', 'gadelmaleh', 'MarceloM12', 'micheltelo',
                        'SalehAlmoghamsy', 'luckymanzano', 'yelyahwilliams', 'DONOMAR', 'SteveCarell', 'neiltyson', 'wisinyyandel', 'NoelSchajris', 'RevRunWisdom', 'SandraDewi88', 'amrdiab', 'ShawnMendes', 'syntekoficial', 'AdelAliBinAli', 'felipeneto', 'polo_polo',
                        'GloriaTrevi', 'TheVijayMallya', 'Ashton5SOS', 'Wale', 'ChinoyNacho', 'Riteishd', 'RealLamarOdom', 'PretaGil', 'TomCavalcante1', 'RandyOrton', 'DjKingAssassin', 'gadiiing', 'DJPaulyD', 'LuceroMexico', 'paulitachaves', 'KevinSpacey',
                        'OzzyOsbourne', 'AdamSchefter', 'GaryLineker', 'VhongX44', '_CristineReyes_', 'JordinSparks', 'juliaperrez', 'rainnwilson', 'silagencoglu', 'QueenRania', 'hulyavsar', 'najwakaram', '1victorvaldes', 'DebbouzeJamel', 'montesjulia',
                        'hazardeden10', 'ajaydevgn', 'indrabektiasli', 'MirandaKerr', 'fayez_malki', 'angelicaksy', 'GaryBarlow', 'TheShilpaShetty', 'aristeguicnn', 'BillCosby', 'tonyhawk', 'noaheverett', 'AndreaLegarreta', 'tylerperry', 'julietav', 'bipsluvurself',
                        'psy_oppa', 'Caradelevingne', 'galifianakisz', 'Nelly_Mo', 'DebbyRyan', 'KellyOsbourne', 'YordiRosado', 'eddieizzard', 'KapilSharmaK9', 'cuneytozdemir', 'JoelOsteen', 'dylanobrien', 'diegotorres', 'KeriHilson', 'yilmazerdogan',
                        'realpreityzinta', 'rogerfederer', 'lordemusic', 'GreenDay', 'PochoLavezzi', 'carlosvives', 'jackwhitehall', 'alyankovic', 'alexoficial', 'Jenna_Marbles', 'MaiteOficial', 'shreyaghoshal', 'LAURAGII', 'raghebalama', 'wyclef', 'Alwaleed_Talal',
                        'scooterbraun', 'Adela_Micha', 'tiesto', 'paramore', 'apriliokevin', 'AshBenzo', 'urgantcom', 'NormanDesVideos', 'iyavillania', 'usainbolt', 'lancearmstrong', 'paulwesley', 'LuisChataing', 'aarbeloa17', 'paulpierce34', 'hitRECordJoe',
                        'HamzaNamira', 'MadhuriDixit', 'IAMJHUD', 'mcuban', 'DrOz', 'belindapop', 'JoyceMeyer', 'ValeYellow46', 'Poconggg', 'gulbenergen', 'TherealTaraji', 'ElBaradei', 'jimjonescapo', 'abdulrahman', 'joelmchale', 'jaimecamil', 'acunilicali',
                        'alinebarros', 'luisnani', 'OfficialWillow', 'ahmethc', 'bigtimerush', '_Pedro17_', 'samsmithworld', 'Schofe', 'pamyurin', 'EmilyOsment', 'itsenriquegil', 'samuelmilby', 'FinallyMario', 'DollyParton', 'ChrisMoyles', 'BradPaisley',
                        'FreddyAmazin', 'FrancoDVita', 'HaifaWehbe', 'DannyDeVito', 'robdyrdek', 'JENNIWOWW', 'mangeshkarlata', 'PaulaFernandes7', 'PrincesSyahrini', 'jasonderulo', 'zoetheband', 'brunogagliasso', 'Schwarzenegger', 'BruMarquezine', 'JoshDevineDrums',
                        'pedroalfonsoo', 'KeshaRose', 'UncleRUSH', 'JakeTAustin', 'officialtulisa', 'EleanorJCalder', 'ochocinco', 'chrisrock', 'sneijder101010', 'SeanKingston', 'brozoxmiswebs', 'MuratBoz', 'vjdaniel', 'JamesFrancoTV', 'amandabynes', 'FePaesLeme',
                        'jessicacediel', 'ANAMARIABRAGA', 'MCHammer', 'giseleofficial', 'Fergie', 'Fonseca', 'dumbassgenius', 'mrsayudewi', 'battalalgoos', 'NellyFurtado', 'kuyakim_atienza', 'nikkigil', 'maddow', 'questlove', 'ErikaDLV', 'RomeoSantosPage',
                        'YUVSTRONG12', 'TravieMcCoy', 'LaurenConrad', '21LVA', 'CaioCastro', 'thiaguinhocomth', 'AHMTKURAL', 'Titi_KamaLL', 'RealVolya', 'rialjorge', 'brookeburke', 'MrPeterAndre', 'ToniKroos', 'mustafaceceli', 'SamiAlJaber', 'GiulianaRancic',
                        'shfly3424', 'lopezandres', 'JoeyEssex_', 'heidiklum', 'lala', 'GemmaAnneStyles', 'mustafa_agha', 'RobertsEmma', 'BustaRhymes', 'manomenezes', 'NathanFillion', 'pattiemallette', '6BillionPeople', 'TheMattEspinosa', 'waleedalfarraj', 'cerati',
                        'myfabolouslife', 'blakegriffin32', 'danawhite', 'EspinozaOficial', 'Khunnie0624', 'Sethrogen', 'andy_murray', 'JohnBishop100', 'laliespos', 'corbuzier', 'ceracoat', 'DavidKWilliams', 'michkeegan', 'Slash', 'deadmau5', 'missA_suzy', 'PBiaL',
                        'BRUNOIERULLO', 'NOAH_ID', 'themichaelowen', 'DrakeBell', 'AnselElgort', 'SaraBareilles', 'MPOFFICIAL', 'Tbambino', 'isco_alarcon', 'VigilanteArtist', 'Manuel_Neuer', 'kevadamsss', 'sethmeyers', 'AndreaSernaTV', 'special1004', 'JanetJackson',
                        'paugasol', 'billmaher', 'JBALVIN', 'RolaWorLD', 'S_C_', 'VINNYGUADAGNINO', 'MsLeaSalonga', 'jack', 'manuginobili', 'ilovegeorgina', 'jackybrv', 'Tyrese', 'ReikMx', 'DaneCook', 'JerrySeinfeld', 'geneliad', 'D_Copperfield', 'RealTracyMorgan',
                        'drdrew', 'marley_ok', 'andreolifelipe', '1LoganHenderson', 'Ibra_official', 'handeyener', 'smosh', 'rickyrozay', 'Caitlyn_Jenner', 'common', 'susoelpaspi', 'huryazarlar', 'DaRealAmberRose', 'Asli_Jacqueline', 'Benzema', 'MarthaStewart',
                        'jamesmaslow', 'lafouine78', 'oscar8', 'Su_Gimenez', 'DavidHenrie', 'Caspar_Lee', 'steveaoki', 'BoAkwon', 'VeraBrezhneva', 'DaniellePeazer', 'JHarden13', 'shrutihaasan', 'Joey7Barton', 'MirzaSania', 'steveaustinBSR', 'krungy21', 'ninagarcia',
                        'farisf9', 'Imaginedragons', 'HayesGrier', 'ryeong9', 'AlbertoCiurana', 'shaymitch', 'mynameisrossa', 'troyesivan', 'ReggieBush', 'mh_awadi', 'chinasuarez', 'Metallica', 'bhogleharsha', 'dedesecco', 'jupaesoficial', 'GNev2', 'StephenCurry30',
                        'TimTebow', 'LewisHamilton', 'gio_antonelli', 'jhutch1992', 'Torres', 'amrwaked', 'bomanirani', 'lenadunham', 'assihallani', 'LeighFrancis', 'williecolon', '7sainaljassmi', 'FLOTUS', 'eseryenenler', 'theweeknd', 'PearlJam', 'AllRiseSilver',
                        'ShawnMichaels', 'shitmydadsays', 'TheVampsband', 'IAmSteveHarvey', 'ABdeVilliers17', 'ErinAndrews', 'OscarFilho', 'sardesairajdeep', 'wilw', 'prattprattpratt', 'itsgabrielleu', 'sertaberener', 'sonunigam', 'lnsaneTweets', 'Jason_Aldean',
                        'MikaSingh', 'ChrisEvans', 'tonyhsieh', 'matsu_bouzu', 'jimmyeatworld', 'MarkWright_', 'cher', 'Alyssa_Milano', 'LisaSurihani', 'lorenzojova', 'ThatKevinSmith', 'MarioGoetze', 'BDUTT', 'thebeatles', 'kasimf', 'SintoniaVerso', 'Javier_Alatorre',
                        'AxelOficial', 'KadimAlSahirORG', 'Niltakipte', 'MagicJohnson', 'BSchweinsteiger', 'KP24', 'Buenafuente', 'ashleesimpson', 'pabloalboran', 'SSantiagosegura', 'drdre', 'KatGraham', 'elonmusk', 'mark_wahlberg', 'desta80s', 'MissyElliott',
                        'PointlessBlog', 'mariagadu', 'solennheussaff', 'DennyCagur', 'Podolski10', 'ImRo45', 'macklemore', 'willylevy29', 'TheRealMikeEpps', 'tarkan', '10neto', 'cadieckmann', 'FannyLu', 'thekillers', 'markhoppus', 'haashoficial', 'germanpaoloski',
                        'LizGillies', 'ActorLeeMinHo', 'notch', 'YALINonline', 'radioleary', 'Elovera22', 'russwest44', 'henrylau89', 'Trevornoah', 'OneRepublic', 'rampalarjun', 'officialJKT48', 'TheFarahKhan', 'RyanSheckler', 'vazqueznico', 'hardwick', 'AlvaroMorata',
                        'kerrywashington', 'cortezrafa', 'marceloadnet0', 'Omar_Almulhem', 'BethanyMota', 'Thiago6', 'TheCarlosPena', 'AlfredoFlores', 'jackgilinsky', 'CAROLE_SAMAHA', 'TonyRobbins', 'carocruzosorio', 'GaryValenciano1', 'KendraWilkinson',
                        '4everBrandy', 'GordonRamsay', 'henrygayle', 'SeppBlatter', 'fucktyler', 'kenandogulu', 'McIlroyRory', 'Garik2000', 'gisel_la', 'RealPaulWalker', 'YASSER_Q_Y20', 'FarrukoPR', 'jhongsample', 'drangelocarbone', 'Flordelav', 'IanMcKellen',
                        'XianLimm', 'SamNasri19', 'zairana', 'DeepakChopra', 'kingsthings', 'Anggun_Cipta', 'icecube', 'LaraDutta', 'DAVID_LYNCH', 'LAAZCARATE', 'jeremypiven', 'FifthHarmony', 'feliciaday', 'ShraddhaKapoor', 'TurkiAldakhil', 'biz', 'OscarDLeon',
                        'TomDaley1994', 'chriscolfer', 'TheRealAC3', 'IAmJericho', 'JackJackJohnson', 'Dbolina', 'JoeyGraceffa', 'Joe_Sugg', 'katedelcastillo', 'masason', 'aaronpaul_8', 'MannyPacquiaoTR', 'MsLaurenLondon', 'PaulMcCartney', 'rossR5', 'TheMandyMoore',
                        'adamlambert', 'anandmahindra', 'BillNye', 'OlaAlfares', 'showimah', 'greysonchance', 'JimGaffigan', 'DENISE_RICHARDS', 'stephenasmith', 'RichardHammond', 'ristomejide', 'iqbaale', 'ThisisDavina', 'D_Ospina1', 'emreaydin', 'raphaelvarane',
                        'JAlvarezFlow', 'xtianbautista', 'carterreynolds', 'KyrieIrving', 'YosriFouda', 'iloveruffag', 'jccaylen', 'shymofficiel', 'Bourdain', 'RachelZoe', 'djkhaled', 'angelicavale', 'jasonsegel', 'dhikacungkring', 'robbiewilliams', 'MrJamesMay',
                        'ImZaheer', 'lottietommo', 'JackHarries', 'wandaicardi', 'HeffronDrive', 'anakarylle', 'elmorenomichael', 'JeremyBieber', 'NathanKress', 'HARDWELL', 'Charlottegshore', 'sarseh', 'Hadise', 'S1dharthM', 'Cyrilhanouna', 'twhiddleston',
                        'superstarrajini', 'manaoficial', 'CMPunk', 'MarcusButler', 'kojiharunyan', 'andrescepeda', 'pattonoswalt', 'TripleH', 'JodiStaMaria', 'sebastianrulli', 'carlosbaute', 'AudrinaPatridge', 'dannapaola', 'siyovushdustov', 'KattPackAllDay',
                        'k_alshenaif', 'officialpepe', 'LeventUzumcu', 'ladyantebellum', 'nxzerooficial', 'ShaneWarne', 'AdnanAlarour', 'Dynamomagician', 'booba', 'MustafaHosny', 'FrencHMonTanA', 'KeithUrban', 'xuxameneghel', 'cala', 'mariko_dayo',
                        'danimartinezweb', 'NajwaShihab', 'AdalRamones', 'Ferrynimous', 'belalfadl', 'OficialGio', 'MikeVick', 'woodyinho', 'bobsaget', 'TomFelton', 'MrsSOsbourne', 'MartinGarrix', 'SteveNash', 'omeshomesh', 'jotaquest', 'mariashriver',
                        'esmuellert_', 'AlKohler7KEPO', 'Yusuf_Mansur', 'VincentKompany', 'williebosshog', 'Stromae', 'neilhimself', 'MoezMasoud', 'DavidSpade', 'PaulaAbdul', 'WWEDanielBryan', 'drose', 'Fabio_Coentrao', 'ayseozyilmazel', 'alo_oficial',
                        'RebelWilson', 'michaelbuble', 'robertmarion', 'bonnovanderputt', 'sgokbakar', 'smoshanthony', 'luke_brooks', 'depechemode', 'amyschumer', 'CraigyFerg', 'FatinSL', 'mnzadornov', 'ayushmannk', 'BIRDMAN5STAR', 'danisuzuki', 'kylieminogue',
                        'Zedd', 'SleepintheGardn', 'therealjuicyj', 'manugavassi', 'soujorge'
        ];

        $screen_name = $screen_names[rand(0,count($screen_names)-1)];

        return $this->getUser($screen_name);

    }


}
