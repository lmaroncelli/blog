<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticoliTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('tblArticoli')->truncate();

        $articoli[] = [
            'titolo' => 'laravel query log with bindings',
            'corpo' => nl2br("\$costi = DB::table('evidenze_for_export_to_ia')
            ->where('id_macro',\$id_macro)
            ->where('nome',\$tipo_evidenza_crm);
            ->get();
    
    
    non utilizzo il metodo get(), MA:
            
    \$costi = DB::table('evidenze_for_export_to_ia')
            ->where('id_macro',\$id_macro)
            ->where('nome',\$tipo_evidenza_crm);
            
            
     dd(str_replace_array('?', \$costi->getBindings(), \$costi->toSql()))"),
            'created_at' =>  Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' =>  Carbon\Carbon::now()->toDateTimeString()
        ];

    $articoli[] = [
            'titolo' => 'Informazioni sui nameserver',
            'corpo' => nl2br("nslookup romagna.info-alberghi.com
            Non-authoritative answer:
            Name:	romagna.info-alberghi.com
            Address: 92.61.157.163
            
            e
            
            whois 92.61.157.163
            
            inetnum:        92.61.156.0 - 92.61.157.255
            netname:        SRVG-NET-HH1-H7-2
            descr:          Servage.net - Hosting Segment 7-2
            remarks:        Abuse Contact: abuse@servage.net
            country:        EU
            admin-c:        sajb-ripe
            tech-c:         sajb-ripe
            status:         ASSIGNED PA
            mnt-by:         sa-mnt
            created:        2015-07-08T16:03:33Z
            last-modified:  2015-07-08T16:04:27Z
            source:         RIPE
            
            person:         Servage GmbH
            address:        Servage GmbH
            address:        Neustadt 16
            address:        24939 Flensburg
            org:            ORG-SG36-RIPE
            mnt-by:         sa-mnt
            phone:          +49 461 3181686
            nic-hdl:        sajb-ripe
            created:        2007-01-31T22:44:30Z
            last-modified:  2017-10-27T10:32:31Z
            source:         RIPE # Filtered
            
            % Information related to '92.61.144.0/20AS29671'
            
            route:          92.61.144.0/20
            descr:          Servage Network
            remarks:        Abuse Contact: abuse@servage.net
            origin:         AS29671
            mnt-by:         sa-mnt
            created:        2007-12-21T09:38:26Z
            last-modified:  2007-12-21T09:38:26Z
            source:         RIPE
            
            
            
            Quindi romagna sta su servage. MA
            
            se interrogo i DNS di romagna
            
            nslookup -type=ns romagna.info-alberghi.com
            
            Authoritative answers can be found from:
            info-alberghi.com
                origin = ns8.thirdeye.it
                mail addr = hostmaster.thirdeye.it
            
            Sono da Gianluca che avrà la gestione della zona DNS ed avrà fatto puntare il record A a servage INFATTI
            
            nslookup -q=A romagna.info-alberghi.com
            
            Non-authoritative answer:
            Name:	romagna.info-alberghi.com
            Address: 92.61.157.163
            
            cioè l'IP di servage
            invece 
            nslookup www.info-alberghi.com
            Name:	www.info-alberghi.com
            Address: 185.19.184.149
            e
            whois 185.19.184.149
            inetnum:        185.19.184.149 - 185.19.184.149
            netname:        THIRDEYE-FREESSLCIDR
            descr:          *************************************
            descr:          third eYe consulting
            descr:          Hosting services
            descr:          Via Melchiorre Delfico 12
            descr:          47924 - Rimini (RN)
            descr:          *************************************
            descr:          Contact: abuse@thirdeye.it
            country:        IT
            admin-c:        MAGI1-RIPE
            tech-c:         MAGI1-RIPE
            status:         ASSIGNED PA
            mnt-by:         MNT-MAGISYSTEM
            created:        2014-02-19T21:00:45Z
            last-modified:  2015-11-10T16:43:35Z
            source:         RIPE
            person:         Gianluca Zamagni
            address:        MAGISYSTEM SRL
            address:        Via Melchiorre Delfico ,12
            address:        I-47924 Rimini
            address:        Italy
            phone:          +39 328 8242325
            nic-hdl:        MAGI1-RIPE
            mnt-by:         MNT-MAGISYSTEM
            mnt-by:         MNT-PARVATI
            created:        2013-01-29T15:14:24Z
            last-modified:  2017-10-30T22:24:21Z
            source:         RIPE
            nslookup -type=ns www.info-alberghi.com
            Authoritative answers can be found from:
            info-alberghi.com
                origin = ns8.thirdeye.it
                mail addr = hostmaster.thirdeye.it
                serial = 2016041924
                refresh = 604800
                retry = 300
                expire = 2419200
                minimum = 604800
            quindi i dns sono da Gianluca 
            e il record A punta sempre a Gianluca"),
            'created_at' =>  Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' =>  Carbon\Carbon::now()->toDateTimeString()
        ];



        DB::table('tblArticoli')->insert($articoli);
    }
}
