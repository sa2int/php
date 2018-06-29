//======================================================================================//
//
//						セレクトプログラム
//
//======================================================================================//
#include		<windows.h>
#include		<stdio.h>
#include		<math.h>
#include		"MASTER/Ci-Lib.H"
#include		"Game.H"

//****************************************************************************
//	■	定義
//
//****************************************************************************



//****************************************************************************
//	■	内部使用　変数
//
//****************************************************************************
GsTEXTURE SelectBG;
GsTEXTURE Ea;
GsTEXTURE Noma;
GsTEXTURE Har;
GsTEXTURE SEn1;
GsTEXTURE SEn2;
GsSOUND	  SBGM;

short SSS[3];
float SEPx[2], SEPy[2], SEDx[2], SEDy[2];
short SRo[2], SRoA[2];
short XCF,XCA;
//--------------------------------------------------------------------------//
//	●	初期化		：シーンに移る時一回、変数の初期化 
//
//--------------------------------------------------------------------------//
void	SelectInit(void)
{
	SRo[0] = 0;
	SRo[1] = 1;

	SRoA[0] = 5;
	SRoA[1] = -5;

	SEPx[0] = -200;
	SEPy[0] = 560;

	SEPx[1] = 2070;
	SEPy[1] = 710;

	SEDx[0] = 10.0f;
	SEDx[1] = -10.0f;

	SEDy[0] = 6.0f;
	SEDy[1] = -6.0f;

	XCF = 0;
	XCA = 1;
}

//--------------------------------------------------------------------------//
//	●	内部処理	：シーン中の処理、現在のシーンで行う処理
//
//--------------------------------------------------------------------------//
void	SelectLoop(void)
{
	XCF = XCF + XCA;

	if (XCF >= 1 && XCF <= 1) {
		Gs_PlayBGM(SBGM);
	}

	if (XCF >= 2) {
		XCF = 0;
		XCA = 0;
	}

	DEB_TEXT(" イージー%d",SSS[0]);
	DEB_TEXT(" ノーマル%d", SSS[1]);
	DEB_TEXT(" ハード%d", SSS[2]);

	SEPx[0] = SEPx[0] + SEDx[0];
	SEPx[1] = SEPx[1] + SEDx[1];

	SEPy[0] = SEPy[0] + SEDy[0];
	SEPy[1] = SEPy[1] + SEDy[1];

	SRo[0] = SRo[0] + SRoA[0];
	SRo[1] = SRo[1] + SRoA[1];

	if (MsAREA(340 - 128, 540 - 150, 256, 360)) {
		SSS[0] = ON;
		if (Mouse.Trg &_lMOUSE) {
			SceneChange(GAME_SCENE);
		}
	}
	else
	{
		SSS[0] = OFF;
	}

	if (MsAREA(940 - 128, 540 - 150, 256, 360)) {
		SSS[1] = ON;
		if (Mouse.Trg &_lMOUSE) {
			SceneChange(TITLE_SCENE);
		}
	}

	else
	{
		SSS[1] = OFF;
	}

	if (MsAREA(1540 - 128, 540 - 150, 256, 360)) {
		SSS[2] = ON;
		if (Mouse.Trg &_lMOUSE) {
			SceneChange(RESULT_SCENE);
		}
	}

	else
	{
		SSS[2] = OFF;
	}

	
		
		if (SEPx[0] >= 2050) {
			SEDx[0] = -10.0f;
		}
		if (SEPx[0] <= -125) {
			SEDx[0] = 10.0f;
		}

		if (SEPy[0] >= 1140) {
			SEDy[0] = -6.0f;
			
		}
		if (SEPy[0] <= -125) {
			SEDy[0] = 6.0f;
		}
	
		if (SEPx[1] >= 2050) {
			SEDx[1] = -10.0f;
		}
		if (SEPx[1] <= -125) {
			SEDx[1] = 10.0f;
		}

		if (SEPy[1] >= 1140) {
			SEDy[1] = -6.0f;

		}
		if (SEPy[1] <= -125) {
			SEDy[1] = 6.0f;
		}
}

//--------------------------------------------------------------------------//
//	●	描画		：シーン中の描画、現在のシーンで表示するBMPはここで
//
//--------------------------------------------------------------------------//
void	SelectDraw(void)
{
	Gs_DrawLayer(940, 540, SelectBG, 0, 0, 1920, 1080, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	Gs_DrawLayer(SEPx[0], SEPy[0], SEn1, 0, 0, 300, 302, OFF, ARGB(254, 255, 255, 254), ON, SRo[0], 1.0f, 1.0f);
	Gs_DrawLayer(SEPx[1], SEPy[1], SEn2, 0, 0, 300, 302, OFF, ARGB(254, 255, 255, 254), ON, SRo[1], 1.0f, 1.0f);
	Gs_DrawLayer(340, 540, Ea, 0, 0, 256, 360, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	Gs_DrawLayer(940, 540, Noma, 0, 0, 256, 360, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);
	Gs_DrawLayer(1540, 540, Har, 0, 0, 256, 360, OFF, ARGB(254, 255, 255, 254), ON, 0, 1.0f, 1.0f);

}

//--------------------------------------------------------------------------//
//	●	ロード		：シーンに入る時、そのシーンで必要なデータの読み込み
//
//--------------------------------------------------------------------------//
short	SelectLoad(void)
{
	SelectBG = Gs_LoadBMP("DATA/BMP/セレクト/背景.PNG");
	Ea = Gs_LoadBMP("DATA/BMP/セレクト/Easy.PNG");
	Noma = Gs_LoadBMP("DATA/BMP/セレクト/Normal.PNG");
	Har = Gs_LoadBMP("DATA/BMP/セレクト/Hard.PNG");
	SEn1 = Gs_LoadBMP("DATA/BMP/タイトル/流れる肉.PNG");
	SEn2 = Gs_LoadBMP("DATA/BMP/タイトル/流れる野菜.PNG");
	SBGM = Gs_LoadWAVE("DATA/SOUND/タイトル/タイトルBGM.WAV ", ON);

	return		SELECT_SCENE;
}

//--------------------------------------------------------------------------//
//	●	後処理		：現在のシーンから抜ける時、データの破棄
//
//--------------------------------------------------------------------------//
void	SelectExit(void)
{
	Gs_ReleaseBMP(SelectBG);
	Gs_ReleaseBMP(Ea);
	Gs_ReleaseBMP(Noma);
	Gs_ReleaseBMP(Har);
	Gs_ReleaseBMP(SEn1);
	Gs_ReleaseBMP(SEn2);
	Gs_ReleaseSOUND(SBGM);
}

//****************************************************************************
//	★　シーンテーブル：各シーンで呼び出される関数の登録
//****************************************************************************

SCENE_TBL	SelectSceneTbl = {
	SelectLoad,
	SelectInit,
	SelectLoop,
	SelectDraw,
	SelectExit
};

//======================================================================================//
//							EOP															//
//======================================================================================//
